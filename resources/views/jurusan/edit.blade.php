@extends('layout.layout')
@include('layout.navbar')
@section('content')
<div class="container mt-5 mb-5">
<h3><a href="{{ route('jurusan.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Edit Jurusan</h3>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
    
    <div class="row">
        <div class="col-md-12">
            <div class="card border-10">
                <div class="card-body">
                    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="put">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Nama Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $jurusan->nama_jurusan }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection