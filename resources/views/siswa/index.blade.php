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

<h3 class="mt-3">Data Siswa Jurusan</h3>
<a href="{{ route('siswa.create') }}" class="btn btn-lg-2 btn-primary mb-2">Tambah Siswa</a>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
        
<table id="example" class="table table-striped w-100 text-white" >
    <thead>
        <tr>
            <th class="text-white">ID</th>
            <th class="text-white">Nama Siswa</th>
            <th class="text-white">NIS</th>
            <th class="text-white">Jurusan</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $siswa)
        <tr>
            <td class="text-white">{{ $siswa->id }}</td>
            <td class="text-white">{{ $siswa->nama_siswa }}</td>
            <td class="text-white">{{ $siswa->nis }}</td>
            <td class="text-white">{{ $siswa->jurusan->nama_jurusan }}</td>
            <td>
                <div class="action-buttons">
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post" class="d-inline">
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
