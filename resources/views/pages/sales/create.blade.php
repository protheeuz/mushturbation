@extends('layouts.default')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Tambah Penjualan</strong>
    </div>
    <div class="card-body card-block">
        <!-- Form untuk menambah penjualan baru -->
        <form action="{{ route('sales.store') }}" method="post">
        @csrf
        <div class="form-group">
            <!-- Label dan dropdown untuk memilih barang yang dijual -->
            <label for="product_id" class="form-control-label">Nama Barang</label>
            <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                <option value="">Pilih Barang</option>
                @foreach($products as $product)
                    <!-- Menampilkan daftar barang yang bisa dipilih -->
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <!-- Menampilkan pesan error jika ada masalah dengan input barang -->
            @error('product_id') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <!-- Label dan input untuk jumlah barang yang dijual -->
            <label for="quantity" class="form-control-label">Kuantitas</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror"/>
            <!-- Menampilkan pesan error jika ada masalah dengan input kuantitas -->
            @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <!-- Tombol untuk menambah penjualan -->
            <button class="btn btn-primary btn-block">Tambah Penjualan</button>
        </div>
        </form>
    </div>
</div>

@endsection
