@extends('layouts.default')

@section('content')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Tambah Barang</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input name="name" type="text" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" />
                    @error('name')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">Tipe Barang</label>
                <div class="col-sm-10">
                    <input name="type" type="text" value="{{ old('type') }}"
                        class="form-control @error('type') is-invalid @enderror" />
                    @error('type')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="description"
                        class="form-control ckeditor @error('description') is-invalid @enderror">
                        {{ old('description') }}
                    </textarea>
                    @error('description')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input name="price" type="number" value="{{ old('price') }}"
                        class="form-control @error('price') is-invalid @enderror" />
                    @error('price')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="quantity" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input name="quantity" type="number" value="{{ old('quantity') }}"
                        class="form-control @error('quantity') is-invalid @enderror" />
                    @error('quantity')
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
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> <!-- .card -->

@endsection