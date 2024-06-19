<!-- Form Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="editArticleModalLabel">Edit Data Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editArtikelForm" role="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="dataId" name="artikel_id" value="">

                    <div class="row">
                        <div class="col-md-12">
                            {{-- <label>Perkembangan</label>
                            <div class="mb-3">
                                <textarea id="perkembangan" class="form-control" name="perkembangan" placeholder="Masukkan perkembangan"></textarea>
                            </div> --}}
                            <label>Sejarah</label>
                            <div class="mb-3">
                                <textarea id="sejarah" class="form-control" name="sejarah" placeholder="Masukkan isi artikel"></textarea>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input id="emailAdress" class="form-control" name="email"
                                            placeholder="Masukkan i"></input>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <label>Telepon</label>
                                    <div class="mb-3">
                                        <input id="telepon" class="form-control" name="telp" placeholder="Masukkan isi artikel"></input>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="mb-3">
                                <textarea type="text" class="form-control" id="alamat" placeholder="masukan alamat" aria-label="Name"
                                    aria-describedby="name-addon" name="alamat"></textarea>
                            </div> --}}

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
