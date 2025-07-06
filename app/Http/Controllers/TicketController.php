<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceipt;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'quantity' => 'required|integer|min:1',
            'payment_proof' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('payment_proof')) {
            $paymentProof = $request->file('payment_proof');
            $fileName = time() . '.' . $paymentProof->getClientOriginalExtension();
            $paymentProof->storeAs('payment_proofs', $fileName, 'public');
        }

        Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'quantity' => $request->quantity,
            'status' => 'pending',
            'payment_proof' => $fileName,
        ]);

        return redirect('/')->with('success', 'Tiket berhasil dipesan! Tunggu konfirmasi admin.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:lunas,pending',
        ]);

        $ticket->update($validated);

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.dashboard')->with('success', 'Tiket berhasil dihapus.');
    }

    public function dashboard()
    {
        if (!session('is_admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $tickets = Ticket::latest()->get();
        return view('tickets.dashboard', compact('tickets'));
    }

   public function updateStatus($id)
{
    $ticket = Ticket::findOrFail($id);

    // Update status, tanggal pembayaran dan tanggal berlaku
    $ticket->status = 'lunas';
    $ticket->paid_at = now();
    $ticket->date = Carbon::now()->addDay()->toDateString(); // Berlaku besok
    $ticket->save();

    // Kirim email bukti pembayaran
    Mail::to($ticket->email)->send(new PaymentReceipt($ticket));

    // Tetap di halaman sebelumnya (admin dashboard)
    return redirect()->back()->with('success', 'Status tiket berhasil diubah menjadi Lunas dan email dikirim.');
}

    public function bukti($id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket->status !== 'lunas') {
            return redirect('/')->with('error', 'Tiket belum lunas.');
        }

        return view('tickets.bukti', compact('ticket'));
    }

    public function sendEmail($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        Mail::to($ticket->email)->send(new PaymentReceipt($ticket));
    }

    public function bulkAction(Request $request)
{
    $action = $request->input('action');
    $ticketIds = $request->input('selected_tickets', []);

    if (empty($ticketIds)) {
        return redirect()->back()->with('error', 'Tidak ada tiket yang dipilih.');
    }

    if ($action === 'approve') {
        DB::table('tickets')
            ->whereIn('id', $ticketIds)
            ->update(['status' => 'lunas']);

        return redirect()->back()->with('success', 'Tiket berhasil disetujui.');
    }

    if ($action === 'delete') {
        DB::table('tickets')->whereIn('id', $ticketIds)->delete();

        return redirect()->back()->with('success', 'Tiket berhasil dihapus.');
    }

    return redirect()->back()->with('error', 'Aksi tidak dikenali.');
}

public function userTickets()
{
    $tickets = Ticket::where('email', auth()->user()->email)->get(); // atau logic lain
    return view('tickets.ticket', compact('tickets'));
}


}
