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

<h3 class="mt-3">Data Siswa</h3>
<a href="{{ route('student.create') }}" class="btn btn-lg-2 btn-primary mb-2">Tambah Data</a>
<a href="{{ route('student.history') }}" class="btn btn-lg-2 btn-secondary mb-2 mx-2">History</a>

@if (session('success'))
    <div class="alert alert-info mt-2" role="alert">
        {{ session('success') }}
    </div>
@endif
        
<table id="example" class="table table-striped w-100 text-white" >
    <thead>
        <tr>
            <th style="width: 8%; text-align:left; color: white;">No.</th>
            <th class="text-white">Nama Siswa</th>
            <th class="text-white">Nomor Induk Siswa</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $stud)
        <tr>
            <td class="text-white">{{ $loop->iteration }}</td>
            <td class="text-white">{{ $stud->nama }}</td>
            <td class="text-white">{{ $stud->nis->nis }}</td>
            <td>
                <div class="action-buttons">
                    <a href="{{ route('student.edit', $stud->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('student.softdelete', $stud->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
