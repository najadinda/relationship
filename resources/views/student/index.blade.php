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
<table id="example" class="table table-striped w-100">
    <thead>
        <tr>
            <th style="width: 8%; text-align:left;">No.</th>
            <th>Nama Siswa</th>
            <th>NIS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $stud)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stud->nama }}</td>
            <td>{{ $stud->nis->nis }}</td>
            <td>
                <div class="action-buttons">
                    <a href="{{ route('student.edit', $stud->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('student.destroy', $stud->id) }}" method="post" class="d-inline">
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
