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

<h3 class="mt-3">Data Hobi Murid</h3>
<a href="{{ route('murid.create') }}" class="btn btn-lg-2 btn-primary mb-2">Tambah Hobi Murid</a>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
        
<table id="example" class="table table-striped w-100 text-white" >
    <thead>
        <tr>
            <th style="width: 8%; text-align:left; color: white;">No.</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Hobi</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($murid as $murid)
        <tr>
            <td class="text-white">{{ $loop->iteration }}</td>
            <td class="text-white">{{ $murid->nama_murid }}</td>
            <td class="text-white">
               @foreach($murid->hobbies as $hobi)
                - {{ $hobi->nama_hobi }} <br>
               @endforeach
            </td>
            <td>
                <div class="action-buttons">
                    <a href="{{ route('murid.edit', $murid->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('murid.destroy', $murid->id) }}" method="post" class="d-inline">
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
