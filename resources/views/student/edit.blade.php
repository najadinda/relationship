@extends('layout.layout')
@section('content')
    <div class="container mt-5 mb-5">
        <h3><a href="{{ route('student.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Edit Data Siswa</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-10">
                    <div class="card-body">
                        <form action="{{ route('student.update', $student->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $student->nama }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="body">NIS</label>
                                <input type="number" class="form-control" name="nis" id="nis" value="{{ $student->nis->nis }}">
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