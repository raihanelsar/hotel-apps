@extends('app')
@section('pagetitle', "Tambah Informasi Tamu")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    @foreach ($errors->all() as $i)
                    <ul>
                        <li>{{$i}}</li>
                    </ul>
                    @endforeach
                </div>
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('guests.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Tamu *</label>
                        <input type="text" class="form-control" name="nama_tamu" placeholder="Masukkan Nama" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check In *</label>
                        <input type="date" class="form-control" name="check_in" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Check Out *</label>
                        <input type="date" class="form-control" name="check_out" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Kamar *</label>
                        <select name="no_kamar" id="" class="form-select">
                            <option value="">--Pilih No--</option>
                            <option value="A01">A01</option>
                            <option value="A02">A02</option>
                            <option value="A03">A03</option>
                            <option value="A04">A04</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Telp *</label>
                        <input type="number" class="form-control" name="no_telp" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status Tamu *</label>
                        <select name="status_tamu" id="" class="form-select">
                            <option value="">--Pilih Status--</option>
                           @foreach ($categories as $category )
                           <option value="{{ $category->name }} ">{{ $category->name }}  </option>
                           @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat *</label>
                        <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kebutuhan Khusus</label><br>
                        <input type="radio" name="statusnya" id="ada" onclick="toggleinput(true)"> Ada
                        <input type="radio" name="statusnya" id="tidak" onclick="toggleinput(false)"> Tidak Ada
                        <input class="form-control mt-2" style="display: none" type="text"
                            name="kebutuhan_khusus" id="kebutuhan_khusus" placeholder="Sebutkan kebutuhannya">
                    </div>

                    <script>
                        function toggleinput(show) {
                            const kebutuhan_khusus = document.querySelector("#kebutuhan_khusus");
                            kebutuhan_khusus.style.display = show ? 'block' : 'none';

                            // Opsional: kosongkan nilai input saat disembunyikan
                            if (!show) kebutuhan_khusus.value = "";
                        }
                    </script>
                    <div class="mb-3">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="{{ url()->previous() }}">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
