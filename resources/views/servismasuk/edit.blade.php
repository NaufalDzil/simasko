@extends('layouts.app')

@section('title', 'Edit Servis')

@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-pencil7"></i> <span class="text-semibold">Edit Servis</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><i class="icon-home2 position-left"></i><a href="{{ route('servismasuk.edit', $servismasuk->id) }}" class="btn btn-sm btn-primary"><i class="icon-pencil7"></i> Edit</a></li>

                <li><a href="{{ route('servismasuk.index') }}">Data Servis</a></li>
                <li class="active">Edit Servis</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Servis</h5>
            </div>

            <div class="panel-body">
                <form action="{{ route('servismasuk.update', $servismasuk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Kategori Servis:</label>
                        <select name="kategori_servis" id="kategori_servis" class="form-control">
                            @foreach ($kategori as $item)
                            <option value="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                          </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Pelanggan:</label>
                        <input type="text" name="nama_pelanggan" value="{{ $servismasuk->nama_pelanggan }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label></label>
                        <input type="text" name="nomor_hp" value="{{ $servismasuk->nomor_hp }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Unit:</label>
                        <input type="text" name="nama_unit" value="{{ $servismasuk->nama_unit }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nomor Unit:</label>
                        <input type="text" name="nomor_unit" value="{{ $servismasuk->nomor_unit }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keluhan:</label>
                        <input type="text" name="keluhan" value="{{ $servismasuk->keluhan }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Teknisi:</label>
                        <select name="nama_teknisi" id="nama_teknisi" class="form-control">
                          @foreach ($karyawan as $item)
                          <option value="{{ $item->nama_karyawan }}">{{ $item->nama_karyawan }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ $servismasuk->status }}">{{ $servismasuk->status }}</option>
                            @if($servismasuk->status != 'Dalam antrian')
                                <option value="Dalam antrian">Dalam antrian</option>
                            @endif
                            @if($servismasuk->status != 'Pengecekan')
                                <option value="Pengecekan">Pengecekan</option>
                            @endif
                            @if($servismasuk->status != 'Pengerjaan')
                                <option value="Pengerjaan">Pengerjaan</option>
                            @endif
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label>Tanggal Masuk:</label>
                        <input type="datetime-local" name="tanggal_masuk" value="{{ $servismasuk->tanggal_masuk }}" class="form-control">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
