<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bagi</title>
</head>
<body>
    <h1>Operasi Bagi</h1>
    <form action="{{ route('store_bagi') }}" method="post">
        @csrf
        <input type="number" name="angka1" placeholder="Angka 1">
        ÷
        <input type="number" name="angka2" placeholder="Angka 2">
        <button type="submit">Hitung</button>
        <a href="{{ url()->previous() }}">Kembali</a>
    </form>

    @isset($hasil)
        <h3>Hasil: {{ $hasil }}</h3>
    @endisset
</body>
</html>
