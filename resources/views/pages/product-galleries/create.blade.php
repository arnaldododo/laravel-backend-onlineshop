@extends('layouts.default')

@section('content')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Tambah Foto Barang</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="products_id" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-sm-2 col-form-label">Foto Barang</label>
                <div class="col-sm-10">
                    <div class="custom-file @error('photo') is-invalid @enderror">
                        <input type="file" name="photo" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih file</label>
                    </div>
                    @error('photo')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="is_default" class="col-sm-2 col-form-label">Jadikan default</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_default" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_default" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                    </div>
                    @error('is_default')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Foto Barang
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> <!-- .card -->

@endsection