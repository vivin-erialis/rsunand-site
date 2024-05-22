<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
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
                        <label>Nama</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="masukan nama dokter"
                                aria-label="Name" aria-describedby="name-addon" name="nama" required>
                        </div>
                        <label>NIP</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="masukan NIP dokter"
                                aria-label="Name" aria-describedby="name-addon" name="nip" required>
                        </div>
                        <label>Tempat Lahir</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="masukan tempat lahir"
                                aria-label="Name" aria-describedby="name-addon" name="tempat_lahir" required>
                        </div>
                        <label>Tanggal Lahir</label>
                        <div class="mb-3">
                            <input type="date" class="form-control" placeholder="masukan tempat lahir"
                                aria-label="Name" aria-describedby="name-addon" name="tanggal_lahir" required>
                        </div>
                        <label>Pendidikan</label>
                        <div class="mb-3">
                            <textarea type="text" id="editor-2" placeholder="masukan pendidikan dokter" aria-label="Name"
                                aria-describedby="name-addon" name="pendidikan"></textarea>
                        </div>
                        <label>Foto</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" aria-describedby="email-addon"
                                name="foto">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Spesialis</label>
                            <select name="spesialis_id" id="mySelect" class="form-control">
                                @foreach ($spesialis as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="">
                            <button type="submit"
                                class="btn btn-success w-13 mt-4 mb-3 float-end"> <i class="fa fa-save me-1"></i>Simpan</button>
                        </div>
                        <div class="">
                            <a href="/admin/dokter"
                                    class="btn btn-danger w-13 mt-4 mb-3 float-end mx-2"> <i class="fa fa-times me-1"></i>Batal
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


