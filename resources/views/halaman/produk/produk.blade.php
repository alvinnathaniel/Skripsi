@extends('layouts/mainDashboard')

@push('head-script')
<link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('container')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Daftar Produk</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal" data-target="#tambahProduk">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Tambah Produk
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th style="width:5%">No</th>
                                    <th style="width:35%">Nama Produk</th>
                                    <th style="width:25%">Kategori</th>
                                    <th style="width:20%">Gambar</th>
                                    <th style="width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produk as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->produk }}</td>
                                    <td>{{ $p->kategori->kategori }}</td>
                                    <td>
                                        @if($p->gambar)
                                        <img class="rounded" src="{{ asset('storage/' . $p->gambar) }}" alt="">
                                        @else
                                        <img class="rounded" src="{{ asset('images\placeholder.jpg') }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-icon" data-toggle="modal" title="Detail" data-target="#detailProduk{{ $p->id }}">
                                            <i data-feather="eye"></i>
                                        </button>
                                        <button type="button" value="{{ $p->id }}" class="btn btn-warning btn-icon ubahProduk" title="Ubah Produk" data-toggle="modal" data-target="#ubahProduk{{ $p->id }}">
                                            <i data-feather="edit"></i>
                                        </button>
                                        <form action="{{ route('hapusProduk', $p->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-icon hapusProduk" title="Hapus">
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

@include('halaman.produk.detail')
@include('halaman.produk.tambah')
@include('halaman.produk.ubah')

@endsection

@push('plugin-js')
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('vendors/dropify/dist/dropify.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
@endpush

@push('custom-js')
<script src="{{ asset('js/file-upload.js') }}"></script>
<script src="{{ asset('js/data-table.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<!-- Form Gambar -->
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    })
</script>

<!-- Form Dinamis -->
<script>
    $(function() {
        $(document).on("click", '.btn-add-row', function() {
            var id = $(this).closest("table").attr('id');
            console.log(id);
            var div = $("<tr/>");
            div.html(GetDynamicTextBox(id));
            $("#" + id + "_tbody").append(div);
        });
        $(document).on("click", "#comments_remove", function() {
            $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger btn-icon" id="comments_remove"><i class="fas fa-trash-alt"></i></button>');
            $(this).closest("tr").remove();
        });

        function GetDynamicTextBox(table_id) {
            $('#comments_remove').remove();
            var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length + 1;
            return '<td><input type="text" name="attribute[]" class="form-control" placeholder="Attribute" ></td>' +
                '<td><input type="text" name="value[]" class="form-control" placeholder="Value" ></td>' + '<td><button type="button" class="btn btn-danger btn-icon" id="comments_remove"><i class="fas fa-trash-alt"></i></button></td>'
        }
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#btn-tambah").click(function() {
        ++i;
        $("#tabel-ubah").append('<tr><td><input type="text" name="attribute[]" class="form-control"/></td>\
        <td><input type="text" name="value[]" class="form-control"/></td>\
        <td><button type="button" class="btn btn-danger btn-icon hapus-baris"><i class="fas fa-trash-alt"></i></button></td></tr>');
    });
    $(document).on('click', '.hapus-baris', function() {
        $(this).parents('tr').remove();
    });
</script>

<!-- Hapus Produk -->
<script type="text/javascript">
    $('.hapusProduk').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
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