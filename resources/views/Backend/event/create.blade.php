    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: whitesmoke;">
                    <h5 class="modal-title" id="addArticleModalLabel">Tambah Data Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="artikelForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nama Event</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="masukan nama event"
                                        aria-label="Name" aria-describedby="name-addon" name="nama_event"
                                        id="nama_event">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Lokasi</label>
                                        <div class="mb-3">
                                            <textarea type="text" class="form-control" placeholder="masukan lokasi event" aria-label="Name"
                                                aria-describedby="name-addon" id="lokasi" name="lokasi"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label>Gambar</label>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" aria-describedby="email-addon"
                                                name="gambar[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label>Deskripsi</label>
                            <div class="mb-3">
                                <textarea type="text" class="form-control" placeholder="masukan deskripsi event" aria-label="Name"
                                    aria-describedby="name-addon" id="desc" name="desc"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Tanggal Mulai</label>
                                    <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tanggal Selesai</label>
                                    <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Jam Mulai </label>
                                    <input class="form-control" type="time" name="jam_awal" id="jam_awal">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Jam Selesai</label>
                                    <input class="form-control" type="time" name="jam_akhir" id="jam_akhir">
                                </div>

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
