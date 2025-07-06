<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'quantity',
        'status',
        'payment_proof',
        'date',       // tanggal berlaku
        'paid_at',    // tanggal pembayaran
    ];

    protected $dates = [
        'paid_at',     // supaya otomatis dikenali sebagai objek Carbon
        'date',
    ];
}
