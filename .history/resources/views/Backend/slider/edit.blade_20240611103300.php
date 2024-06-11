<!-- Form Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="editArticleModalLabel">Edit Data Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" role="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="dataId" name="artikel_id" value="">

                    <div class="row">
                        <div class="col-md-12">
                            <label>Judul </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="judul" name="title"
                                    placeholder="Masukkan judul slider">
                            </div>
                            <label>Deskripsi </label>
                            <div class="mb-3">
                                <textarea  id="deskripsi" class="form-control" name="desc" placeholder="Masukkan deskripsi artikel"></textarea>
                            </div>

                            <label>Gambar</label>
                            <input type="file" class="form-control mb-3" id="gambarArtikel" name="img[]" multiple>

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
