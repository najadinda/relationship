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

<h3 class="mb-3"><a href="{{ route('siswa.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a>  History</h3>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
        
<table id="example" class="table table-striped w-100 text-white" >
    <thead>
        <tr>
            <th class="text-white">No</th>
            <th class="text-white">Nama Siswa</th>
            <th class="text-white">Jurusan</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $siswa)
        <tr>
            <td class="text-white">{{ $loop->iteration }}</td>
            <td class="text-white">{{ $siswa->nama_siswa }}</td>
            <td class="text-white">{{ $siswa->jurusan->nama_jurusan }}</td>
            <td>
                <div class="action-buttons">
                    <form action="{{ route('siswa.restore', $siswa->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Anda ingin mengembalikan data ini?')"><i class="bi bi-arrow-counterclockwise"></i></button>
                    </form>
                    <form action="{{ route('siswa.forceDelete', $siswa->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
