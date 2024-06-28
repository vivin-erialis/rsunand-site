<!-- Form Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="editArticleModalLabel">Tambah Data Perkembangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addArtikelForm" role="form" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <label>Heading Perkembangan</label>
                            <div class="mb-3">
                                <input id="title_perkembangan" class="form-control" name="title_perkembangan" placeholder="Tahun 2024"></input>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <label>Perkembangan</label>
                            <div class="mb-3">
                                <textarea id="perkembangan" class="form-control" name="perkembangan" placeholder="Masukkan perkembangan"></textarea>
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
