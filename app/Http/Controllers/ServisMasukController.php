<?php

namespace App\Http\Controllers;

use App\Models\ServisMasuk;
use App\Models\KategoriServis;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
Use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ServisMasukController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userName = $user->name;

        // Jika pengguna adalah "Admin", ambil semua data
        if ($userName == 'Admin') {
            $servismasuk = ServisMasuk::orderBy('id', 'desc')->get();
        } else {
            // Jika bukan "Admin", ambil data yang sesuai dengan nama teknisi
            $servismasuk = ServisMasuk::where('nama_teknisi', $userName)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('servismasuk.index', compact('servismasuk'));
    }

    public function create()
    {
        $users = User::whereNotIn('name', ['Karyawan', 'Admin'])->get();
        $kategori = KategoriServis::all();

        return view('servismasuk.create', compact('kategori','users'));
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
        $users = User::whereNotIn('name', ['Karyawan', 'Admin'])->get();

        return view('servismasuk.edit', compact('kategori','users'), [
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
