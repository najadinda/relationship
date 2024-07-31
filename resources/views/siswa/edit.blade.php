@extends('layout.layout')
@include('layout.navbar')
@section('content')
<div class="container mt-5 mb-5">
<h3><a href="{{ route('siswa.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Edit Data Siswa</h3>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
    
    <div class="row">
        <div class="col-md-12">
            <div class="card border-10">
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Pilih Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                                @foreach($jurusan as $jur)
                                    <option value="{{ $jur->id }}" {{ $siswa->jurusan_id == $jur->id ? 'selected':''}}>
                                        {{ $jur->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
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