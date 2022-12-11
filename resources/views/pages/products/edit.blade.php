@extends('layouts.default')

@section('content')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Ubah Barang</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Barang</label>
                        <input name="name" type="text" value="{{ old('name') ?: $item->name }}"
                            class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="type" class="control-label">Tipe Barang</label>
                        <input name="type" type="text" value="{{ old('type') ?: $item->type }}"
                            class="form-control @error('type') is-invalid @enderror" />
                        @error('type')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="control-label">Deskripsi</label>
                <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror">
                        {{ old('description') ?: $item->description }}
                    </textarea>
                @error('description')
                <div class="text-muted">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="price" class="control-label">Harga</label>
                        <input name="price" type="number" value="{{ old('price') ?: $item->price }}"
                            class="form-control @error('price') is-invalid @enderror" />
                        @error('price')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="quantity" class="control-label">Jumlah</label>
                        <input name="quantity" type="number" value="{{ old('quantity') ?: $item->quantity }}"
                            class="form-control @error('quantity') is-invalid @enderror" />
                        @error('quantity')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan perubahan
                </button>
            </div>
        </form>
    </div>
</div> <!-- .card -->

@endsection