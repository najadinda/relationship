@extends('layout.layout')
@include('layout.navbar')
@section('content')

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
        </tr>
    </thead>
    <tbody>
        @foreach($jurusan as $jur)
        <tr>
            <td class="text-white">{{ $jur->id }}</td>
            <td class="text-white">{{ $jur->nama_jurusan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
