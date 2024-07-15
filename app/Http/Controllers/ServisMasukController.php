<?php

namespace App\Http\Controllers;

use App\Models\ServisMasuk;
use App\Models\KategoriServis;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
Use App\Models\Karyawan;

class ServisMasukController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $servismasuk = ServisMasuk::paginate(10);
        return view('servismasuk.index', compact('servismasuk','karyawan'));
    }

    public function create()
    {
        $kategori = KategoriServis::all();
        $karyawan = Karyawan::all();

        return view('servismasuk.create', compact('kategori','karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required',
            'nama_unit' => 'required',
            'nomor_unit'=>'required',
            'tanggal_masuk',
            'keluhan' => 'required',
            'nama_teknisi' => 'required',
            'kategori_servis' => 'required',
            'status' => 'required'
        ]);

        ServisMasuk::create($request->all());

        return redirect()->route('servismasuk.index')->with('success', 'Servis baru berhasil ditambahkan.');
    }

    public function edit(ServisMasuk $servismasuk)
    {
        $kategori = KategoriServis::all();
        $karyawan = Karyawan::all();

        return view('servismasuk.edit', compact('kategori','karyawan'), [
            'title' => 'Edit Servis Masuk',
            'servismasuk' => $servismasuk,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_servis' => 'required',
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required',
            'nama_unit' => 'required',
            'nomor_unit'=>'required',
            'tanggal_masuk' => 'required',
            'keluhan' => 'required',
            'nama_teknisi' => 'required',
            'status' => 'required'
        ]);

        $servismasuk = ServisMasuk::findOrFail($id);
        $servismasuk->update($request->all());

        return redirect()->route('servismasuk.index', compact('servismasuk'))->with('success', 'Servis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $servismasuk = ServisMasuk::findOrFail($id);
        $servismasuk->delete();

        return redirect()->route('servismasuk.index')->with('success', 'Servis berhasil dihapus.');
    }

    public function printServis()
    {
        $servismasuk = ServisMasuk::all();
        $pdf = Pdf::loadView('servismasuk.print', compact('servismasuk'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('data_servis.pdf');
    }
}
