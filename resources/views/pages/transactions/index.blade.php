@extends('layouts.default')

@section('content')

<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Transaksi </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor</th>
                                    <th>Total trans</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $no => $item)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>${{ $item->transaction_total }}</td>
                                    <td>
                                        @if($item->transaction_status == 'PENDING')
                                        <span class="badge badge-warning">
                                            @elseif($item->transaction_status == 'SUCCESS')
                                            <span class="badge badge-success">
                                                @elseif($item->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                                    @else
                                                    <span>
                                                        @endif
                                                        {{ $item->transaction_status }}
                                                    </span>
                                    </td>
                                    <td>
                                        @if($item->transaction_status == 'PENDING')
                                        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i></a>
                                        @endif
                                        <a href="#detail-transaksi"
                                            data-remote="{{ route('transactions.show', $item->id) }}"
                                            data-title="Detail transaksi {{ $item->uuid }}" data-toggle="modal"
                                            data-target="#detail-transaksi" class="btn btn-info btn-sm"><i
                                                class="fa fa-eye"></i></a>


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

<!-- Modal -->
<div class="modal fade" id="detail-transaksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">&nbsp;</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
{{-- /.modal --}}

@endsection

@push('after-script')
<script>
    jQuery(document).ready(function($){
        $('#detail-transaksi').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-title').text(button.data('title'));
            modal.find('.modal-body').load(button.data('remote'));
        });
    });
</script>
@endpush