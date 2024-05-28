{{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" role="form" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
              <div class="col-md-12">
                <label>Nama</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan nama dokter"
                    aria-label="Name" aria-describedby="name-addon" id="nama" name="nama" >
                </div>
                <label>NIP</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan NIP dokter"
                    aria-label="Name" aria-describedby="name-addon" id="nip" name="nip" >
                </div>
                <label>Tempat Lahir</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan tempat lahir"
                    aria-label="Name" aria-describedby="name-addon" id="tempatLahir" name="tempat_lahir" >
                </div>
                <label>Tanggal Lahir</label>
                <div class="mb-3">
                  <input type="date" class="form-control" placeholder="masukan tempat lahir"
                    aria-label="Name" aria-describedby="name-addon" id="tanggalLahir" name="tanggal_lahir">
                </div>
                <label>Pendidikan</label>
                <div class="mb-3">
                  <textarea type="text" id="editor2" placeholder="masukan pendidikan dokter" aria-label="Name"
                    aria-describedby="name-addon" name="pendidikan" id="pendidikan"></textarea>
                </div>
                <label>Foto</label>
                <div class="mb-3">
                  <input type="file" class="form-control" aria-describedby="email-addon"
                    name="foto">
                </div>
                <div class="form-group">
                  <label class="control-label">Spesialis</label>
                  <select name="spesialis_id" id="spesialisId" class="form-control">
                    @foreach ($spesialis as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success"> <i class="fa fa-save me-1"></i>Simpan</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-times me-1"></i>Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Form Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="editArticleModalLabel">Edit Data Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editArtikelForm" role="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="artikelId" name="artikel_id" value="">
                    <!-- Hidden input fields to store original description and content -->
                    {{-- <input type="hidden" id="deskripsiArtikelHidden" name="deskripsi_artikel_hidden">
                    <input type="hidden" id="isiArtikelHidden" name="isi_artikel_hidden"> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Judul Artikel</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="judulArtikel" name="title"
                                    placeholder="Masukkan judul artikel">
                            </div>
                            <label>Deskripsi Artikel</label>
                            <div class="mb-3">
                                <textarea  id="deskripsiArtikel" class="form-control" name="desc" placeholder="Masukkan deskripsi artikel"></textarea>
                            </div>
                            <label>Isi Artikel</label>
                            <div class="mb-3">
                                <textarea id="isiArtikel" class="form-control" name="isi" placeholder="Masukkan isi artikel"></textarea>
                            </div>
                            <label>Gambar</label>
                            <input type="file" class="form-control mb-3" id="gambarArtikel" name="gambar[]" multiple>
                            <div class="form-group">
                                <label class="control-label">Kategori Artikel</label>
                                <select id="spesialisId" name="spesialis_id" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
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

