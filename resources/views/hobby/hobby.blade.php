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

<h3 class="mt-3">Hobi</h3>
<a href="{{ route('hobby.create') }}" class="btn btn-lg-2 btn-primary mb-2">Tambah Hobi</a>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
        
<table id="example" class="table table-striped w-100 text-white" >
    <thead>
        <tr>
            <th style="width: 8%; text-align:left; color: white;">No</th>
            <th class="text-white">Hobby</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hobbies as $hobi)
        <tr>
            <td class="text-white text-left">{{ $loop->iteration }}</td>
            <td class="text-white">{{ $hobi->nama_hobi }}</td>
            <td>
            <div class="action-buttons">
                    <!-- <a href="" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> -->
                    <form action="{{ route('hobby.destroy', $hobi->id) }}" method="post" class="d-inline">
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
