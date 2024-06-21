<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Product;
use App\Models\Models\Transaction;
use App\Models\Models\TransactionDetail;
use Illuminate\Support\Str;

class SalesController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('pages.sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $total = $product->price * $request->quantity;

        $transaction = Transaction::create([
            'uuid' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'number' => '123456789',
            'transaction_total' => $total,
            'transaction_status' => 'SUCCESS',
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'product_name' => $product->name, // Simpan nama produk
        ]);

        $product->quantity -= $request->quantity;
        $product->save();

        return redirect()->route('transactions.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }
}
