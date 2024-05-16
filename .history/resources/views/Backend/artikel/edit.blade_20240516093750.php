    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        aria-labelledby="editArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editArticleModalLabel">Edit Data Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="/admin/artikel/{{ $artikel->id }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Judul Artikel</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="masukan judul artikel"
                                        aria-label="Name" aria-describedby="name-addon" name="title"
                                        value="{{ $artikel->title }}">
                                </div>
                                <label>Deskripsi Artikel</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor" placeholder="masukan deskripsi artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="desc">{{ $artikel->desc }}</textarea>
                                </div>
                                <label>Isi Artikel</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor-2" placeholder="masukan isi artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="isi">{{ $artikel->isi }}</textarea>
                                </div>
                                <label>Gambar</label>
                                <input type="file" class="form-control" aria-describedby="email-addon"
                                    name="gambar[]" multiple>

                                <div class="form-group">
                                    <label class="control-label">Kategori Artikel</label>
                                    <select name="kategori_id" id="mySelect" class="form-control">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $artikel->kategori_id ? 'selected' : '' }}>
                                                {{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success w-13 mt-4 mb-3 float-end"> <i
                                            class="fa fa-save me-1"></i> Simpan</button>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-danger w-13 mt-4 mb-3 float-end mx-2"
                                        data-dismiss="modal">
                                        <i class="fa fa-times me-1"></i> Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        $(document).ready(function() {
        $('.edit-btn').click(function() {
        var artikelId = $(this).data('id');
        $.ajax({
        url: '/admin/artikel/' + artikelId + '/edit', // Sesuaikan dengan rute Anda
        type: 'GET',
        success: function(response) {
        // Isi formulir modal dengan data artikel yang diterima dari server
        $('#judulArtikel').val(response.title);
        $('#deskripsiArtikel').val(response.desc);
        $('#isiArtikel').val(response.isi);
        $('#kategoriArtikel').val(response.kategori_id);
        $('#editArticleModal').modal('show');
        },
        error: function(xhr, status, error) {
        // Handle error
        console.error(xhr.responseText);
        }
        });
        });
        });
