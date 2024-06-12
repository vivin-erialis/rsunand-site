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
                                <label>Milestone</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor" placeholder="" aria-label="Name"
                                        aria-describedby="name-addon" name="milestone"></textarea>
                                </div>
                                <label>Sejarah</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor-2" placeholder="" aria-label="Name"
                                        aria-describedby="name-addon" name="sejarah"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input id="email" class="form-control" name="email"
                                                placeholder="masukan email"></input>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label>Telepon</label>
                                        <div class="mb-3">
                                            <input id="telp" class="form-control" name="telp" placeholder="masukan telepon"></input>
                                        </div>
                                    </div>
                                </div>
                                <label>Alamat</label>
                                <div class="mb-3">
                                    <textarea type="text" class="form-control" id="editor-2" placeholder="masukan alamat" aria-label="Name"
                                        aria-describedby="name-addon" name="alamat"></textarea>
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


