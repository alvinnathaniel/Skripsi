@foreach($produk as $data)
<div class="modal fade bd-example-modal-lg" id="detailProduk{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="detailProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailProduk">{{ $data->produk }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="media d-block d-sm-flex">
                <img src="{{ asset('storage/' . $data->gambar) }}" class="align-self-center wd-100p wd-sm-200 mb-3 mb-sm-0 mr-3" alt="...">
                <div class="media-body">
                    <div class="container">
                        <dl class="row mt-3">
                            <dt class="col-sm-3">Nama Produk </dt>
                            <dd class="col-sm-9">: {{ $data->produk }}</dd>

                            <dt class="col-sm-3">Jenis Produk</dt>
                            <dd class="col-sm-9">: {{ $data->kategori->kategori}}</dd>

                            <dt class="col-sm-3">Keterangan</dt>
                            <dd class="col-sm-9">: {{ $data->keterangan }}</dd>

                            <dt class="col-sm-3">Spesifikasi</dt>
                            <dd class="col-sm-9">
                                <dl class="row">
                                    @foreach($data->Spesifikasi as $spesifikasi)
                                    <dd class="col-sm-4">: {{ $spesifikasi->attribute }}</dd>
                                    <dd class="col-sm-8">= {{ $spesifikasi->value }}</dd>
                                    @endforeach
                                </dl>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach