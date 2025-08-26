@extends('app')
@section('title', 'Tambah Kamar')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h3 class="card-title">
                    <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            @csrf
                            <label for="" class="form-label">Kategori Kamar</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Pilih Kategori Kamar</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}} </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kamar*</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga *</label>
                            <input type="number" class="form-control" name="price" placeholder="Masukkan Harga Kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fasilitas *</label>
                            <textarea class="form-control" name="facility" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="description" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image_cover">Gambar</label>
                            <input type="file" name="image_cover" class="form-control" required>
                         </div>
                        <div class="mb-3">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                           <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection
