@extends('layouts.default')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Transaksi Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor</th>
                                <th>Total Transaksi</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Status Transaksi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>Rp {{ $item->transaction_total }}</td>
                                    <td>
                                        @if($item->details->isNotEmpty() && $item->details->first()->product)
                                            {{ $item->details->first()->product->name }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->details->isNotEmpty())
                                            {{ $item->details->first()->quantity }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->transaction_status == 'PENDING')
                                        <span class="badge badge-info">Pending</span>
                                        @elseif($item->transaction_status == 'SUCCESS')
                                        <span class="badge badge-success">Success</span>
                                        @elseif($item->transaction_status == 'FAILED')
                                        <span class="badge badge-danger">Failed</span>
                                        @else
                                        <span>{{ $item->transaction_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#mymodal" data-remote="{{ route('transactions.show', $item->id) }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi {{ $item->uuid }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <!-- <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a> -->
                                        <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center p-5">Data Kosong</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
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
@endsection