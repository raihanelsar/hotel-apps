@extends('app')
@section('pagetitle', 'Data Kategori')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->name }}</td>
                            <td>{{ $valuedatas->category->name }}</td>
                            <td>{{ $valuedatas->name }}</td>
                            <td>{{ number_format ($valuedatas->price) }}</td>
                            <td>
                                <a href="{{ route('rooms.edit', $valuedatas->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('rooms.destroy', $valuedatas->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
<button class="btn btn-danger">Delete</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
