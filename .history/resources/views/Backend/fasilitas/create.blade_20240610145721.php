<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background-color: whitesmoke;">
            <h5 class="modal-title" id="addArticleModalLabel">Tambah Data Artikel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="artikelForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label>Nama Fasilitas</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="masukan judul fasilitas"
                                aria-label="Name" aria-describedby="name-addon" name="title" id="title" required>
                        </div>
                        <label>Deskripsi </label>
                        <div class="mb-3">
                            <textarea type="text" class="form-control" placeholder="masukan deskripsi fasilitas" aria-label="Name"
                                aria-describedby="name-addon" name="deskripsi"></textarea>
                        </div>

                        <label>Gambar</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" aria-describedby="email-addon"
                                name="gambar[]" multiple required>
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


