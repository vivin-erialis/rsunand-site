    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: whitesmoke;">
                    <h5 class="modal-title" id="addArticleModalLabel"> Data Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="artikelForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">


                                <label>Sejarah</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor-2" placeholder="masukan isi artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="sejarah"></textarea>
                                </div>
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="editor-2" placeholder="masukan email" aria-label="Name"
                                        aria-describedby="name-addon" name="email"></input>
                                </div>
                                <label>Telelpon</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="editor-2" placeholder="masukan telepon" aria-label="Name"
                                        aria-describedby="name-addon" name="telp"></input>
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


