@extends('Backend.layout.main')
@section('title', 'Halaman Data Artikel')
@section('content')
    <nav class="card border navbar navbar-main navbar-expand-lg mx-3 px-0 shadow-none rounded" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Artikel</li>
                </ol>
                {{-- <h6 class="font-weight-bold mb-0">Data Bidang</h6> --}}
            </nav>
        </div>
    </nav>

    {{-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast-template" class="toast toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto" class="toast-title" id="toast-title">Bootstrap</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div> --}}


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
                        <table id="myTable" class="display">
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

                // Fungsi untuk mengambil dan menampilkan data artikel
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
                                html +=
                                    '<td><a href="" class="btn btn-sm btn-success"><i class="fa fa-check text-xs me-2"></i>Aktif</a></td>';
                                html += '<td><p class="px-3 mb-0">' + article.title +
                                    '<br></p></td>';
                                html += '<td><p class="px-3 mb-0">' + article.desc + '</p></td>';
                                html += '<td>';
                                html +=
                                    '<button class="btn btn-sm btn-success edit-btn" data-id="' +
                                    article.id +
                                    '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                                html +=
                                    '<button class="btn btn-sm btn-danger delete-btn" data-id="' +
                                    article.id +
                                    '" data-toggle="modal" data-target="#deleteModal"> <i class="fa fa-trash text-xs me-2"></i> Hapus</button>';
                                html += '</td>';
                                html += '</tr>';
                            });
                            $('#artikel-table-body').html(html);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error:', textStatus, errorThrown); // Debugging
                        }
                    });
                }

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

                // ClassicEditor
                //     .create(document.querySelector('#editor-3'))
                //     .then(editor => {
                //         // CKEditor #editor-3 siap, tetapkan editor ke variabel global
                //         window.editor3 = editor;
                //     })
                //     .catch(error => {
                //         console.error(error);
                //     });

                // ClassicEditor
                //     .create(document.querySelector('#editor-4'))
                //     .then(editor => {
                //         // CKEditor #editor-4 siap, tetapkan editor ke variabel global
                //         window.editor4 = editor;
                //     })
                //     .catch(error => {
                //         console.error(error);
                //     });

                // // Menangani klik tombol edit
                // $('.edit-btn').click(function() {
                //     var artikelId = $(this).data('id');
                //     $.ajax({
                //         url: '/admin/artikel/' + artikelId + '/edit',
                //         type: 'GET',
                //         success: function(response) {
                //             // Isi formulir modal dengan data artikel yang diterima dari server
                //             $('#artikelId').val(response.id);
                //             $('#judulArtikel').val(response.title);

                //             // Atur nilai menggunakan metode setData dari CKEditor setelah CKEditor sepenuhnya diinisialisasi
                //             if (window.editor3) {
                //                 window.editor3.setData(response.desc);
                //             }

                //             if (window.editor4) {
                //                 window.editor4.setData(response.isi);
                //             }

                //             $('#kategoriArtikel').val(response.kategori_id);
                //             $('#editModal').modal('show');
                //         },
                //         error: function(xhr, status, error) {
                //             console.error(xhr.responseText);
                //         }
                //     });
                // });

                // // Tangani pengiriman formulir
                // $('#editArtikelForm').on('submit', function(e) {
                //     e.preventDefault();
                //     var formData = new FormData(this);
                //     var artikelId = $('#artikelId').val();

                //     // Dapatkan nilai dari CKEditor dan simpan dalam field input tersembunyi
                //     var descValue = window.editor3.getData();
                //     var isiValue = window.editor4.getData();

                //     formData.append('desc', descValue);
                //     formData.append('isi', isiValue);

                //     $.ajax({
                //         url: '/admin/artikel/' + artikelId,
                //         type: 'POST',
                //         data: formData,
                //         processData: false,
                //         contentType: false,
                //         success: function(response) {
                //             console.log(response);
                //             alert(response.message);
                //             $('#editModal').modal('hide');
                //             location.reload(); // Muat ulang halaman setelah berhasil disimpan
                //         },
                //         error: function(xhr, status, error) {
                //             console.error(xhr.responseText);
                //             alert('Terjadi kesalahan, silakan coba lagi.');
                //         }
                //     });
                // });

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

                            // Atur nilai menggunakan metode setData dari CKEditor setelah CKEditor sepenuhnya diinisialisasi
                            if (window.editor3) {
                                window.editor3.setData(response.desc);
                            }

                            if (window.editor4) {
                                window.editor4.setData(response.isi);
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

                // Memuat data artikel saat halaman dimuat
                loadArticles();
            });
        </script>

    @endsection
