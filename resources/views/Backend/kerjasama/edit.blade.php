<!-- Form Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="editArticleModalLabel">Edit Data Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editArtikelForm" role="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="id_kerjasama" name="" value="">

                            <label>Nama Kerja Sama</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="masukan nama kerja sama"
                                    aria-label="Name" aria-describedby="name-addon" name="nama_kerjasama"
                                    id="namaKerjasama">
                            </div>

                            <label>Gambar</label>
                            <div class="mb-3">
                                <input type="file" class="form-control" aria-describedby="email-addon" name="gambar"
                                >
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-success w-13 mt-4 mb-3 float-end">
                                    <i class="fa fa-save me-1 text-xs"></i> Simpan
                                </button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-sm btn-dark w-13 mt-4 mb-3 float-end mx-2"
                                    data-dismiss="modal">
                                    <i class="fa fa-times me-1 text-xs"></i> Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
