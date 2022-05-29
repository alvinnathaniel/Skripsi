@extends('layouts/mainDashboard')

@push('head-script')
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@section('container')
<div class="page-content">
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Data Kategori Produk</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal" data-target="#tambahKategori">
        <i class="btn-icon-prepend" data-feather="plus"></i>
        Tambah Kategori
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tabelKategori" class="table table-stripped">
              <thead>
                <tr>
                  <th style="width:5%">No</th>
                  <th style="width:80%">Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kategori as $k)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $k->kategori }}</td>
                  <td>
                    <button class="btn btn-warning btn-icon ubahKategori" value="{{ $k->id }}">
                      <i data-feather="edit"></i>
                    </button>
                    <form action="{{ route('hapusKategori', $k->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-icon hapusKategori">
                        <i data-feather="trash"></i>
                      </button>
                    </form>
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
</div>

@include('halaman.kategori.tambah')
@include('halaman.kategori.ubah')

@endsection

@push('plugin-js')
<script src="sweetalert2.all.min.js"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/data-table.js') }}"></script>

<!-- Data Table -->
<script>
  $(document).ready(function() {
    $('#tabelKategori').DataTable({
      pageLength: 10,
      filter: true,
      deferRender: true,
      scrollCollapse: true,
      scroller: true,
      searching: true,
    });
  });
</script>

<!-- Ubah Kategori -->
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.ubahKategori', function() {
      var kategori_id = $(this).val();
      $('#ubahKategori').modal('show');
      $.ajax({
        type: "GET",
        url: "/kategori/edit/" + kategori_id,
        success: function(response) {
          $('#kategori').val(response.kategori.kategori);
          $('#kategori_id').val(kategori_id);
        }
      });
    });
  });
</script>

<!-- Hapus Kategori -->
<script type="text/javascript">
  $('.hapusKategori').on('click', function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    Swal.fire({
      title: 'Apakah Anda Yakin ?',
      text: "Produk yang berkaitan akan terhapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        form.submit();
      }
    })
  })
</script>
@endpush