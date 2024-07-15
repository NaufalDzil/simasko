@extends('layouts.app')

@section('title', 'Dashoard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</a></li>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $jumlahSupplier }}</h3>

          <p>Supplier</p>
        </div>
        <div class="icon">
          <i class="fas fa-truck"></i>
        </div>
        <a href="{{ route('supplier.index') }}" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $totalJumlahSemuaBarang }}</h3>

          <p>Stok Barang</p>
        </div>
        <div class="icon">
          <i class="fas fa-boxes"></i>
        </div>
        <a href="{{ route('dbarang.index') }}" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $jumlahServis }}</h3>

          <p>Servis</p>
        </div>
        <div class="icon">
          <i class="fas fa-screwdriver"></i>
        </div>
        <a href="route('servismasuk.index')}}" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <div class="col-lg-12">
      <!-- Tabel Daftar Barang -->
      {{-- <div class="card">
          <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($jumlahBarang as $barang)
                          <tr>
                              <td>{{ $barang->id }}</td>
                              <td>{{ $barang->kd_barang }}</td>
                              <td>{{ $barang->nama }}</td>
                              <td>{{ $barang->kategoribarang->nama_kategori }}</td>
                              <td>{{ $barang->jumlah }}</td>
                              <td>{{ $barang->harga_beli }}</td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
          <!-- /.card-body -->
      </div> --}}
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-striped">
          <thead>
            <th width = "5%" class="text-center">No</th>
            <th width = "15%" class="text-center">Kode Barang</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Supplier</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga Beli</th>
          </thead>
          <tbody>
            @foreach ($jumlahBarang as $key => $item)
                <tr>
                  <td class="text-center">{{ $key + 1 }}</td>
                  <td class="text-center">{{ $item->kd_barang }}</td>
                  <td>{{ $item->kategoribarang->nama_kategori }}</td>
                  <td>{{ $item->supplier->nama }}</td>
                  <td>{{ $item->nama }}</td>
                  <td class="text-center">{{ $item->jumlah ?? '0' }}</td>
                  <td>{{ $item->satuan }}</td>
                  <td>{{ 'Rp ' . number_format($item->harga_beli, 0, ',', '.') }}</td>
                  
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- /.card -->
  </div>
  <!-- /.Left col -->
</div>
</div>
  <!-- /.row (main row) -->
@endsection

@push('script')
<script>
  $('.table').DataTable()
</script>
@endpush