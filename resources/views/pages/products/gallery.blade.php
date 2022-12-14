@extends('layouts.default')

@section('content')

<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Foto Barang <small>{{ $product->name }}</small></h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Default</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $no => $item)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <a href="{{ $item->photo }}" target="_blank">
                                            <img src="{{ $item->photo }}" />
                                        </a>
                                    </td>
                                    <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                                    <td>
                                        <form action="{{ route('product-galleries.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted p-5">
                                        Data tidak ada
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->

    </div>
</div>
<!-- /.orders -->

@endsection