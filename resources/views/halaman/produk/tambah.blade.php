<div class="modal fade bd-example-modal-lg" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="tambahProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahProduk">Masukkan Data dengan Benar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tambahProduk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="produk">Nama Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk" placeholder="Masukkan Nama Produk" required>
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
                        <input type="file" id="gambar" name="gambar" class="dropify" data-height="150" />
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mb-0" id="table_alterations">
                                    <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th style="width: 64px;"><button type="button" class="btn btn-primary btn-icon btn-add-row"><i data-feather="plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_alterations_tbody">
                                        <tr>
                                            <td><input type="text" name="attribute[]" class="form-control" placeholder="Attribute"></td>
                                            <td><input type="text" name="value[]" class="form-control" placeholder="Value"></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>