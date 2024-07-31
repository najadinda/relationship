@extends('layout.layout')
@include('layout.navbar')
@section('content')
<div class="container mt-5 mb-5">
<h3><a href="{{ route('murid.index') }}"><i class="bi bi-arrow-left-circle text-black"></i></a> Edit Data Users</h3>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
    
    <div class="row">
        <div class="col-md-12">
            <div class="card border-10">
                <div class="card-body">
                    <form action="{{ route('murid.update', $murid->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Murid</label>
                            <input type="text" class="form-control" id="nama_murid" name="nama_murid" value="{{ $murid->nama_murid }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Hobi</label><br>
                            @foreach($hobbies as $hobi)
                            <input type="checkbox" name="hobi[]" value="{{ $hobi->id }}" 
                            @if(in_array($hobi->id, $murid->hobbies->pluck('id')->toArray()))
                             checked @endif> {{ $hobi->nama_hobi }}<br>
                            @endforeach
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
