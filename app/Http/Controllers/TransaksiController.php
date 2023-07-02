<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();

        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        return view('transaksis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cart' => 'required',
            'id_user' => 'required',
            'code_payment' => 'required',
            'number_payment' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksis.index')->with('success', 'Transaksi created successfully.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        return view('transaksis.edit', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_cart' => 'required',
            'id_user' => 'required',
            'code_payment' => 'required',
            'number_payment' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksis.index')->with('success', 'Transaksi updated successfully.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi deleted successfully.');
    }
}
