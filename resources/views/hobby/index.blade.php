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

<h3 class="mt-3">Data Hobi</h3>
<a href="" class="btn btn-lg-2 btn-primary mb-2">Tambah Data</a>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
        
<table id="example" class="table table-striped w-100 text-white" >
    <thead>
        <tr>
            <th style="width: 8%; text-align:left; color: white;">No.</th>
            <th class="text-white">Nama Siswa</th>
            <th class="text-white">Hobi</th>
            <th class="text-white">Aksi</th>
        </tr>
    </thead>
    <tbody>
    
    </tbody>
</table>
@endsection
