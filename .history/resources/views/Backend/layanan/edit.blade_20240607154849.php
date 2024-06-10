<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background-color: whitesmoke;">
            <h5 class="modal-title" id="addArticleModalLabel">Edit Data Layanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="artikelForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Kategori Layanan</label>
                            <select name="kategori_layanan" id="mySelect" class="form-control">
                                @php
                                    $kategori_layanan = [
                                        (object) ['id' => "1", 'title' => 'Layanan Unggulan'],
                                        (object) ['id' => "2", 'title' => 'LayananPenunjang'],
                                        (object) ['id' => "3", 'title' => 'Layanan Rawat Jalan'],
                                        (object) ['id' => "4", 'title' => 'Lainnya'],
                                    ];
                                @endphp

                                @foreach ($kategori_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach

                            </select>
                        </div>
                        <label>Nama Layanan</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="masukan nama layanan"
                                aria-label="Name" aria-describedby="name-addon" name="nama_layanan" id="nama_layanan"
                                required>
                        </div>
                        <label>Deskripsi </label>
                        <div class="mb-3">
                            <textarea type="text" class="form-control" placeholder="masukan deskripsi " aria-label="Name"
                                aria-describedby="name-addon" name="desc"></textarea>
                        </div>
                        <label>Isi </label>
                        <div class="mb-3">
                            <textarea type="text" id="editor-2" aria-label="Name"
                                aria-describedby="name-addon" name="isiLayanan"></textarea>
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
