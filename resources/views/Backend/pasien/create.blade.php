<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="addArticleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="artikelForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jenis Data</label>
                                    <div class="mb-3">
                                        <select name="nama_value" id="nama_value" class="form-control">
                                            <option value="1">Petunjuk Lokasi</option>
                                            <option value="2">Fasilitas</option>
                                            <option value="3">Rawat Inap</option>
                                            <option value="4">Jam Bezuk</option>
                                            <option value="5">FAQ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Judul Data</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan judul fasilitas"
                                            aria-label="Name" aria-describedby="name-addon" name="nama"
                                            id="title" required>
                                    </div>

                                </div>

                            </div>
                            <label>Deskripsi</label>
                            <div class="mb-3">
                                <textarea type="text" id="editor-2" placeholder="masukan isi artikel" aria-label="Name"
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
