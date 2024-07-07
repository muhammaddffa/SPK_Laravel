@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Alternatif</label>
                <input type="text" name="code_alternatif" class="form-control" placeholder="Kode Alternatif" value="{{ $alternatif->code_alternatif }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama Alternatif</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Alternatif" value="{{ $alternatif->nama }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamt" value="{{ $alternatif->alamat }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection