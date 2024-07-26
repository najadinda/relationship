@extends('layout.layout')
@include('layout.navbar')
@section('content')

<style>
    .action-buttons {
        display: flex;
        gap: 10px; 
    }

    .action-buttons form {
        display: inline;
        margin: 0;
    }
</style>

<h3 class="mt-3">Data Jurusan</h3>
<a href="{{ route('jurusan.create') }}" class="btn btn-lg-2 btn-primary mb-2">Tambah Jurusan</a>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif

<table id="example" class="table table-striped w-100" >
    <thead>
        <tr>
            <th class="text-white">ID</th>
            <th class="text-white">Nama Jurusan</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurusan as $jur)
        <tr>
            <td class="text-white">{{ $jur->id }}</td>
            <td class="text-white">{{ $jur->nama_jurusan }}</td>
            <td>
                <div class="action-buttons">
                    <a href="{{ route('jurusan.edit', $jur->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('jurusan.destroy', $jur->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection