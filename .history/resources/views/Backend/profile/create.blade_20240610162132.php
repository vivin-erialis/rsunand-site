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
                                <label>Gambar</label>
                                <div class="mb-3">
                                    <input type="file" class="form-control" aria-describedby="email-addon"
                                        name="gambar[]" multiple required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Kategori Artikel</label>
                                    <select name="kategori_id" id="mySelect" class="form-control">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
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


