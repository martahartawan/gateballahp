@extends('layouts.master')
@section('content')
@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  {{ $error }}
</div>
@endforeach
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session('success') }}
</div>

@endif
<div class="col-lg-12 order-lg-1">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('produk.update' , $produk->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}">
        </div>
        <div class="form-group">
            <label>Proteim</label>
            <input type="number" class="form-control" name="C1" value="{{ $produk->C1 }}">
        </div>
        <div class="form-group">
            <label>Lemak</label>
            <input type="number" class="form-control" name="C2" value="{{ $produk->C2 }}">
        </div>
        <div class="form-group">
            <label>Serat Mentah</label>
            <input type="number" class="form-control" name="C3" value="{{ $produk->C3 }}">
        </div>
        <div class="form-group">
            <label>Kelembapan</label>
            <input type="number" class="form-control" name="C4" value="{{ $produk->C4 }}">
        </div>
        <div class="form-group">
            <label>Kecocokan Merk</label>
            <input type="number" class="form-control" name="C5" value="{{ $produk->C5 }}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Produk</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection