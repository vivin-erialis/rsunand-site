    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
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
                                <label>Judul Artikel</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="masukan judul artikel"
                                        aria-label="Name" aria-describedby="name-addon" name="title" required>
                                </div>
                                <label>Deskripsi Artikel</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor" placeholder="masukan deskripsi artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="desc"></textarea>
                                </div>
                                <label>Isi Artikel</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor-2" placeholder="masukan isi artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="isi"></textarea>
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
                                    <button type="submit" class="btn btn-success w-13 mt-4 mb-3 float-end">
                                        <i class="fa fa-save me-1"></i> Simpan
                                    </button>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-dark w-13 mt-4 mb-3 float-end mx-2"
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
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fungsi untuk mengambil dan menampilkan data artikel
            function loadArticles() {
                $.ajax({
                    url: "{{ route('getArtikel')}}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let html = '';
                        response.artikel.forEach(function(article) {
                            html += '<tr>';
                            html += '<td><a href="" class="btn btn-sm btn-success"><i class="fa fa-check text-xs me-2"></i>Aktif</a></td>';
                            html += '<td><p class="px-3 mb-0">' + article.title + '<br></p></td>';
                            html += '<td><p class="px-3 mb-0">' + article.desc + '</p></td>';
                            html += '<td>';
                            html += '<button class="btn btn-sm btn-success edit-btn" data-id="' + article.id + '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                            html += '<button class="btn btn-sm btn-danger delete-btn" data-id="' + article.id + '" data-toggle="modal" data-target="#deleteModal"> <i class="fa fa-trash text-xs me-2"></i> Delete</button>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $('#artikel-table-body').html(html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            }

            $('#artikelForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: '/admin/artikel',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        alert(response.message);
                        $('#addModal').modal('hide');

                        // Hapus elemen backdrop modal secara manual
                        $('.modal-backdrop').remove();

                        // Memuat ulang data artikel setelah data berhasil disimpan
                        loadArticles();
                    },
                    error: function(response) {
                        console.log(response);
                        if (response.responseJSON && response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            var errorMessage = '';
                            for (var error in errors) {
                                errorMessage += errors[error] + '\n';
                            }
                            alert(errorMessage);
                        } else {
                            alert('Terjadi kesalahan, silakan coba lagi.');
                            console.log('Full response:', response);
                        }
                    }
                });
            });

            // Memuat data artikel saat halaman dimuat
            loadArticles();
        });
    </script>

