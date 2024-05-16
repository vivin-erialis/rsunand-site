<!-- Form Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
                    <div class="row">
                        <div class="col-md-12">
                            <label>Judul Artikel</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="judulArtikel" name="title"
                                    placeholder="Masukkan judul artikel">
                            </div>
                            <label>Deskripsi Artikel</label>
                            <div class="mb-3">
                                <textarea id="editor-3" class="form-control" name="desc" placeholder="Masukkan deskripsi artikel"></textarea>
                            </div>
                            <label>Isi Artikel</label>
                            <div class="mb-3">
                                <textarea id="editor-4" class="form-control" name="isi" placeholder="Masukkan isi artikel"></textarea>
                            </div>
                            <label>Gambar</label>
                            <input type="file" class="form-control mb-3" id="gambarArtikel" name="gambar[]" multiple>
                            <div class="form-group">
                                <label class="control-label">Kategori Artikel</label>
                                <select id="kategoriArtikel" name="kategori_id" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success w-13 mt-4 mb-3 float-end"><i
                                        class="fa fa-save me-1"></i> Simpan</button>
                                <button type="button" class="btn btn-danger w-13 mt-4 mb-3 float-end mx-2"
                                    data-dismiss="modal"><i class="fa fa-times me-1"></i> Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->

<script>
    $(document).ready(function() {
    $('.edit-btn').click(function() {
        var artikelId = $(this).data('id');
        $.ajax({
            url: '/admin/artikel/' + artikelId + '/edit',
            type: 'GET',
            success: function(response) {
                // Isi formulir modal dengan data artikel yang diterima dari server
                $('#artikelId').val(response.id);
                $('#judulArtikel').val(response.title);

                // Simpan nilai asli dari deskripsi dan isi artikel
                $('#deskripsiArtikelHidden').val(response.desc);
                $('#isiArtikelHidden').val(response.isi);

                // Atur nilai menggunakan metode setData dari CKEditor
                $('#editor-3').val(response.desc);
                $('#editor-4').val(response.isi);

                $('#kategoriArtikel').val(response.kategori_id);
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#editModal').on('shown.bs.modal', function () {
        // Inisialisasi CKEditor setelah modal ditampilkan
        ClassicEditor
            .create(document.querySelector('#editor-3'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor-4'))
            .catch(error => {
                console.error(error);
            });
    });

    // Tangani pengiriman formulir
    $('#editArtikelForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var artikelId = $('#artikelId').val();
        // Gunakan nilai asli dari deskripsi dan isi artikel
        formData.append('desc', $('#deskripsiArtikelHidden').val());
        formData.append('isi', $('#isiArtikelHidden').val());
        $.ajax({
            url: '/admin/artikel/' + artikelId,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                alert(response.message);
                $('#editModal').modal('hide');
                location.reload(); // Reload halaman setelah berhasil disimpan
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan, silakan coba lagi.');
            }
        });
    });
});

</script>


