@extends('layouts.default')

@section('content')

<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Barang </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $no => $item)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <a href="{{ route('products.gallery', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-picture-o"></i></a>
                                        <a href="{{ route('products.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('products.destroy', $item->id) }}" method="POST"
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