@extends('Backend.layout.main')
@section('title', 'Halaman Data Profile')
@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Artikel</h6>
                                <p class="text-sm">Data Artikel RS Unand</p>
                            </div>
                            <div class="ms-auto d-flex">
                                <button class="btn btn-sm btn-dark btn-icon d-flex align-items-center" data-toggle="modal"
                                    data-target="#addModal">
                                    <span class="btn-inner--icon">
                                        <i class="fa fa-plus mx-2"></i>
                                    </span>
                                    <span class="btn-inner--text">Tambah Data</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container p-3">
                        {{-- <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th class="text-dark text-xs font-weight-semibold">Status</th>
                                    <th class="text-dark text-xs font-weight-semibold">Judul Artikel</th>
                                    <th class="text-dark text-xs font-weight-semibold">Deskripsi</th>
                                    <th class="text-dark text-xs font-weight-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="artikel-table-body">
                                <!-- Data akan dimuat di sini menggunakan AJAX -->
                            </tbody>
                        </table> --}}
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th class="text-dark text-xs font-weight-semibold">Status</th>
                                    <th class="text-dark text-xs font-weight-semibold">Judul Artikel</th>
                                    </th>
                                    <th class="text-dark text-xs font-weight-semibold">Deskripsi</th>
                                    <th class="text-dark text-xs font-weight-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="artikel-table-body">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('Backend.artikel.create')
        @include('Backend.artikel.edit')
        @include('Backend.artikel.hapus')
        <script>
            $(document).ready(function() {
                // Setup CSRF token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Inisialisasi DataTables
                var table = $('#myTable').DataTable();

                // Fungsi untuk memuat artikel
                function loadArticles() {
                    console.log('Load Articles function called'); // Debugging

                    $.ajax({
                        url: "{{ route('getArtikel') }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log('Success:', response); // Debugging
                            let html = '';
                            response.artikel.forEach(function(article) {
                                html += '<tr>';
                                html += '<td width="5%">';
                                if (article.status == 0) {
                                    html +=
                                        '<a href="#" class="btn btn-sm btn-success change-status" data-id="' +
                                        article.id + '" data-status="1">Aktif</a>';
                                } else {
                                    html +=
                                        '<a href="#" class="btn btn-sm btn-danger change-status" data-id="' +
                                        article.id + '" data-status="0">Non Aktif</a>';
                                }
                                html += '</td>';
                                html += '<td><p class="px-3 mb-0">' + article.title +
                                    '<br></p></td>';
                                html += '<td><p class="px-3 mb-0">' + article.desc + '</p></td>';
                                html += '<td>';
                                html +=
                                    '<button class="btn btn-sm btn-warning edit-btn" data-id="' +
                                    article.id +
                                    '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                                html +=
                                    '<button class="btn btn-sm btn-danger mx-2 delete-btn" data-id="' +
                                    article.id +
                                    '" data-toggle="modal" data-target="#deleteModal"> <i class="fa fa-trash text-xs me-2"></i> Hapus</button>';
                                html += '</td>';
                                html += '</tr>';
                            });

                            // Kosongkan DataTables dan isi dengan data baru
                            table.clear().draw();
                            table.rows.add($(html)).draw();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error:', textStatus, errorThrown); // Debugging
                        }
                    });
                }

                $(document).on('click', '.change-status', function(event) {
                    event.preventDefault();

                    var articleId = $(this).data('id');
                    var newStatus = $(this).data('status');
                    console.log(articleId);

                    $.ajax({
                        url: '/admin/artikel/' + articleId + '/status',
                        type: 'PUT',
                        data: {
                            status: newStatus
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Update tampilan tombol sesuai dengan status baru
                            if (newStatus == 1) {
                                $(this).removeClass('btn-success').addClass('btn-danger').text(
                                    'Non Aktif').data('status', 0);
                            } else {
                                $(this).removeClass('btn-danger').addClass('btn-success').text(
                                    'Aktif').data('status', 1);
                            }
                            toastr.success(response.message);

                            loadArticles();
                            // Atau Anda bisa melakukan penyesuaian tampilan lain sesuai kebutuhan
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                // Event handler untuk form submit
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
                            toastr.success(response.message);

                            // Tutup modal setelah berhasil menambahkan data
                            $('#addModal').modal('hide');
                            // Kosongkan nilai input di dalam modal
                            // Event handler untuk membersihkan modal setelah ditutup
                            $('#addModal').on('hidden.bs.modal', function() {
                                $(this).find('form')[0].reset(); // Reset semua input form
                                for (var instance in CKEDITOR.instances) {
                                    CKEDITOR.instances[instance].setData(
                                        ''); // Reset CKEditor instance
                                }
                            });;

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

                ClassicEditor
                    .create(document.querySelector('#isiArtikel'))
                    .then(editor => {
                        // CKEditor #editor-4 siap, tetapkan editor ke variabel global
                        window.editor3 = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
                // Event delegation for delete button
                $(document).on('click', '.edit-btn', function() {
                    var artikelId = $(this).data('id');
                    console.log("Edit button clicked, artikelId:", artikelId); // Debugging
                    $.ajax({
                        url: '/admin/artikel/' + artikelId + '/edit',
                        type: 'GET',
                        success: function(response) {
                            // Isi formulir modal dengan data artikel yang diterima dari server
                            $('#artikelId').val(response.id);
                            $('#judulArtikel').val(response.title);
                            $('#deskripsiArtikel').val(response.desc);

                            // Atur nilai menggunakan metode setData dari CKEditor setelah CKEditor sepenuhnya diinisialisasi
                            if (window.editor) {
                                window.editor.setData(response.desc);
                            }

                            if (window.editor3) {
                                window.editor3.setData(response.isi);
                            }

                            $('#kategoriArtikel').val(response.kategori_id);

                            // Setelah semua data dimuat, tampilkan modal
                            $('#editModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                $('#editArtikelForm').on('submit', function(event) {
                    event.preventDefault();

                    var isi = editor3.getData();

                    // Siapkan data form
                    var formData = new FormData(this);
                    formData.set('isi', isi);

                    var artikelId = $('#artikelId').val();

                    $.ajax({
                        url: '/admin/artikel/' + artikelId,
                        method: 'POST', // Sesuaikan dengan metode yang digunakan di rute, bisa 'PUT' atau 'PATCH'
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // alert('Artikel berhasil diperbarui!');
                            $('#editModal').modal('hide');
                            $('.modal-backdrop').remove();
                            toastr.success(response.message);

                            loadArticles();
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    errorMessage += errors[key][0] + '\n';
                                }
                            }
                            alert('Terjadi kesalahan:\n' + errorMessage);
                        }
                    });
                });

                // Event delegation for delete button
                $(document).on('click', '.delete-btn', function() {
                    var artikelId = $(this).data('id');
                    console.log("Delete button clicked, artikelId:", artikelId); // Debugging
                    $('#deleteModal').modal('show');

                    // Saat konfirmasi hapus diklik, kirim permintaan penghapusan
                    $('#deleteBtn').off('click').on('click', function() {
                        $.ajax({
                            url: '/admin/artikel/' + artikelId,
                            type: 'DELETE',
                            success: function(response) {
                                console.log(response);
                                // Tampilkan pesan toast
                                $('#deleteModal').modal('hide');
                                // Memuat ulang data artikel setelah artikel berhasil dihapus
                                $('.modal-backdrop').remove();
                                toastr.success(response.message);

                                loadArticles();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                alert('Terjadi kesalahan, silakan coba lagi.');
                            }
                        });
                    });
                });

                loadArticles();
            });
        </script>

    @endsection
