@extends('layout.layout')
@include('layout.navbar')
@section('content')
    <div class="container mt-5 mb-5">
        <h3><a href="{{ route('siswa.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Tambah Daftar Siswa Jurusan</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-10">
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>
                            <div class="form-group">
                                <label for="title">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" required>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Pilih Jurusan</label>
                                <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                                    @foreach($jurusan as $jur)
                                        <option value="{{ $jur->id }}">{{ $jur->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Buat Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection