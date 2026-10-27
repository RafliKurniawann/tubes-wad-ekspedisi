<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class EkspedisiController extends Controller
{
    public function index()
    {
        $ekspedisi = Ekspedisi::all();
        return view('ekspedisi.index', compact('ekspedisi'));
    }

    public function create()
    {
        return view('ekspedisi.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'           => 'required|unique:ekspedisi,kode',
            'nama_ekspedisi' => 'required',
            'nomor_telepon'  => 'required',
            'layanan'        => 'required|in:Reguler,Express,Kargo',
            'zonasi'         => 'required',
        ]);

        Ekspedisi::create($data);

        return redirect()->route('ekspedisi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Ekspedisi $ekspedisi)
    {
        return view('ekspedisi.form', compact('ekspedisi'));
    }

    public function update(Request $request, Ekspedisi $ekspedisi)
    {
        $data = $request->validate([
            'nama_ekspedisi' => 'required',
            'nomor_telepon'  => 'required',
            'layanan'        => 'required|in:Reguler,Express,Kargo',
            'zonasi'         => 'required',
        ]);

        $ekspedisi->update($data);

        return redirect()->route('ekspedisi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Ekspedisi $ekspedisi)
    {
        $ekspedisi->delete();

        return redirect()->route('ekspedisi.index')->with('success', 'Data berhasil dihapus.');
    }
}