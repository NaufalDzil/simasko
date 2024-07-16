@extends('layouts.app')

@section('title', 'Data Servis')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Servis</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('servismasuk.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Servis Baru</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th width="5%" class="text-center">No</th>
                <th>Kategori Servis</th>
                <th>Nama Pelanggan</th>
                <th>No Telepon</th>
                <th>Nama Unit</th>
                <th>Nomor Unit</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Nama Teknisi</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($servismasuk as $key => $row)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $row->kategori_servis }}</td>
                  <td>{{ $row->nama_pelanggan }}</td>
                  <td>{{ $row->nomor_hp }}</td>
                  <td>{{ $row->nama_unit }}</td>
                  <td>{{ $row->nomor_unit }}</td>
                  <td>{{ $row->keluhan }}</td>
                  <td>{{ $row->status }}</td>
                  <td>{{ $row->nama_teknisi }}</td>
                  <td>{{ $row->tanggal_masuk }}</td>
                  <td class="text-center">
                    <a href="{{ route('servismasuk.edit', $row->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    <!-- Tombol untuk menampilkan modal -->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-url="{{ route('servismasuk.destroy', $row->id) }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@include('servismasuk.modal-delete')

@if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: '{{ session('success') }}',
          showConfirmButton: false,
          timer: 3000
      });
  </script>
@endif

@if(session('error'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: '{{ session('error') }}',
          showConfirmButton: false,
          timer: 3000
      });
  </script>
@endif
@endsection


@push('script')

<script>
  $('.table').DataTable()
</script>
@endpush
