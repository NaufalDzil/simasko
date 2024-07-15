@extends('layouts.app')

@section('title', 'Tambah Servis')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="javascript:history.back()">Servis Masuk</a></li>
    <li class="breadcrumb-item active">Tambah Servis Baru</a></li>
@endsection

@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-file-plus"></i> <span class="text-semibold">Tambah Servis Baru</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('servismasuk.index') }}">Servis Masuk</a></li>
                <li class="active">Tambah Servis Baru</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Tambah Servis Baru</h5>
            </div>

            <div class="panel-body">
                <form action="{{ route('servismasuk.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                      <label>Kategori Servis:</label>
                      <select name="kategori_servis" id="kategori_servis" class="form-control">
                        @foreach ($kategori as $item)
                        <option type='text' value="{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                      </select>
                  </div>

                    <div class="form-group">
                        <label>Nama Pelanggan:</label>
                        <input type="text" name="nama_pelanggan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Telepon:</label>
                        <input type="text" name="nomor_hp" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Unit:</label>
                        <input type="text" name="nama_unit" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nomor Unit:</label>
                        <input type="text" name="nomor_unit" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Keluhan:</label>
                      <input type="text" name="keluhan" class="form-control">
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
                        <option value="Dalam antrian">Dalam Antrian</option>
                        <option value="Pengecekan">Pengecekan</option>
                        <option value="Pengerjaan">Pengerjaan</option>
                      </select>
                </div>

                <div class="form-group">
                  <label>Tanggal Masuk:</label>
                  <p><span id="tanggalwaktu"></span></p>
                  <script>
                    var dt = new Date();
                    document.getElementById("tanggalwaktu").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
                </script>
              </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush