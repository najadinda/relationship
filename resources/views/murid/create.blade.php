@extends('layout.layout')
@include('layout.navbar')
@section('content')
    <div class="container mt-5 mb-5">
        <h3><a href="{{ route('murid.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Tambah Hobi Murid</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-10">
                    <div class="card-body">
                        <form action="{{ route('murid.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama_murid">Nama</label>
                                <input type="text" class="form-control" id="nama_murid" name="nama_murid" required>
                            </div>
                            <div class="form-group">
                                <label for="hobi">Hobi</label><br>
                                @foreach($hobbies as $hobi)
                                    <input type="checkbox" name="hobi[]" value="{{ $hobi->id }}"> {{ $hobi->nama_hobi }}<br>
                                @endforeach
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