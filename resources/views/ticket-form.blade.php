<h1>Form Pemesanan Tiket</h1>
<form action="/submit" method="POST">
    @csrf
    Nama: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Jumlah Tiket: <input type="number" name="quantity"><br>
    <button type="submit">Pesan</button>
</form>
