@extends('layout.layout')
@include('layout.navbar')
@section('content')
    <div class="container mt-5 mb-5">
        <h3><a href="{{ route('hobby.hobby') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Tambah Daftar Hobi</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-10">
                    <div class="card-body">
                        <form action="{{ route('hobby.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="nama_hobi">Hobi</label>
                                <input type="text" class="form-control" id="nama_hobi" name="nama_hobi" required>
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