@foreach($produk as $produk)
<div class="modal fade bd-example-modal-lg" id="ubahProduk{{ $produk->id }}" tabindex="-1" role="dialog" aria-labelledby="ubahProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahProduk">Masukkan Data dengan Benar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ubahProduk') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="produk">Nama Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk" value="{{ $produk->produk }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <select class="js-example-basic-single" name="kategori_id" id="kategori_id">
                                    @foreach($kategori as $k)
                                    <option value="{{ $k -> id }}">{{ $k -> kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="dropify" id="gambar" name="gambar" data-default-file="{{ asset('storage/' . $produk->gambar) }}" data-height="150" />
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="5">{{ $produk->keterangan }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mb-0" id="tabel-ubah">
                                    <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th style="width: 64px;"><button type="button" id="btn-tambah" class="btn btn-primary btn-icon "><i data-feather="plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produk->Spesifikasi as $spesifikasi)
                                        <tr>
                                            <td><input type="text" name="attribute[]" class="form-control" value="{{ $spesifikasi-> attribute }}"></td>
                                            <td><input type="text" name="value[]" class="form-control" value="{{ $spesifikasi->value }}"></td>
                                            <td><button type="button" class="btn btn-danger btn-icon hapus-baris"><i class="fas fa-trash-alt"></i></button></td>
                                        </tr>
                                        <tr id="form"></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach