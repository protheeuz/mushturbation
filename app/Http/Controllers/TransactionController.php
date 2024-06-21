<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Transaction;

class TransactionController extends Controller
{
    // Middleware untuk memastikan pengguna sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan daftar transaksi
    public function index()
    {
        // Mengambil semua transaksi beserta detail produknya
        $items = Transaction::with('details.product')->get();
        // Mengirim data transaksi ke view 'index'
        return view('pages.transactions.index', compact('items'));
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show(string $id)
    {
        // Mencari transaksi berdasarkan ID, termasuk detail produknya
        $item = Transaction::with('details.product')->findOrFail($id);
        // Mengirim data transaksi ke view 'show'
        return view('pages.transactions.show', compact('item'));
    }

    // Menghapus transaksi berdasarkan ID
    public function destroy($id)
    {
        // Mencari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);
        // Menghapus transaksi
        $transaction->delete();

        // Redirect ke halaman index transaksi dengan pesan sukses
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    // Menampilkan form untuk mengedit transaksi berdasarkan ID
    public function edit($id)
    {
        // Mencari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);
        // Mengirim data transaksi ke view 'edit'
        return view('pages.transactions.edit', compact('transaction'));
    }
}