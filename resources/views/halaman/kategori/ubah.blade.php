<div class="modal fade" id="ubahKategori" tabindex="-1" role="dialog" aria-labelledby="modalUbahKategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUbahKategori">Ubah Nama Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="formUbah" id="formUbah" action="{{ route('ubahKategori') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="kategori_id" id="kategori_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori Produk</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
