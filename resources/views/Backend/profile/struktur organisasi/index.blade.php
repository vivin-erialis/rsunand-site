@extends('Backend.layout.main')
@section('title', 'Halaman Data Struktur Organisasi')
@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Struktur Organisasi</h6>
                                <p class="text-sm">Struktur Organisasi RS Unand</p>
                            </div>
                            {{-- <div class="ms-auto d-flex">
                                <button class="btn btn-sm btn-dark btn-icon d-flex align-items-center" data-toggle="modal"
                                    data-target="#addModal">
                                    <span class="btn-inner--icon">
                                        <i class="fa fa-plus mx-2"></i>
                                    </span>
                                    <span class="btn-inner--text">Tambah Data</span>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="container p-3">

                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th class="text-dark text-xs font-weight-semibold" style="text-align: left">Gambar</th>
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
        @include('Backend.profile.struktur organisasi.edit')
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
                function loadData() {
                    console.log('Load Articles function called'); // Debugging

                    $.ajax({
                        url: "{{ route('getProfile') }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log('Success:', response); // Debugging
                            let html = '';
                            response.profile.forEach(function(profile) {
                                html += '<tr>';
                                    html += '<td style="text-align: center;"><p class="px-3 mb-0">' +
                                    '<img src="' + profile.foto_url +
                                    '" alt="Foto profile" style="width:400px; height:auto;"><br>' +
                                    '</p></td>';

                                html += '<td>';
                                html +=
                                    '<button class="btn btn-sm btn-warning edit-btn" data-id="' +
                                    profile.id +
                                    '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                               ;
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

                // Event handler untuk form submit
                $('#artikelForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: '/admin/struktur-organisasi',
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
                            loadData();
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
                    .create(document.querySelector('#sejarah'))
                    .then(editor => {
                        // CKEditor #editor-4 siap, tetapkan editor ke variabel global
                        window.editor3 = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
                // ClassicEditor
                //     .create(document.querySelector('#perkembangan'))
                //     .then(editor => {
                //         // CKEditor #editor-4 siap, tetapkan editor ke variabel global
                //         window.editor4 = editor;
                //     })
                //     .catch(error => {
                //         console.error(error);
                //     });
                // Event delegation for delete button
                $(document).on('click', '.edit-btn', function() {
                    var dataId = $(this).data('id');
                    console.log("Edit button clicked, dataId:", dataId); // Debugging
                    $.ajax({
                        url: '/admin/struktur-organisasi/' + dataId + '/edit',
                        type: 'GET',
                        success: function(response) {
                            // Isi formulir modal dengan data artikel yang diterima dari server
                            $('#dataId').val(response.id);
                            // $('#emailAdress').val(response.email);
                            // $('#telepon').val(response.telp);
                            // $('#alamat').val(response.alamat);



                            if (window.editor3) {
                                window.editor3.setData(response.sejarah);
                            }
                            // if (window.editor4) {
                            //     window.editor4.setData(response.perkembangan);
                            // }


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

    // Siapkan data form
    var formData = new FormData(this);
    var dataId = $('#dataId').val();

    $.ajax({
        url: '/admin/struktur-organisasi/' + dataId,
        method: 'POST', // Sesuaikan dengan metode yang digunakan di rute, bisa 'PUT' atau 'PATCH'
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-HTTP-Method-Override': 'PUT' // Ini untuk memastikan metode PUT dikirim dengan benar
        },
        success: function(response) {
            $('#editModal').modal('hide');
            $('.modal-backdrop').remove();
            toastr.success(response.message);
            loadData();
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
                    var dataId = $(this).data('id');
                    console.log("Delete button clicked, dataId:", dataId); // Debugging
                    $('#deleteModal').modal('show');

                    // Saat konfirmasi hapus diklik, kirim permintaan penghapusan
                    $('#deleteBtn').off('click').on('click', function() {
                        $.ajax({
                            url: '/admin/struktur-organisasi/' + dataId,
                            type: 'DELETE',
                            success: function(response) {
                                console.log(response);
                                // Tampilkan pesan toast
                                $('#deleteModal').modal('hide');
                                // Memuat ulang data artikel setelah artikel berhasil dihapus
                                $('.modal-backdrop').remove();
                                toastr.success(response.message);

                                loadData();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                alert('Terjadi kesalahan, silakan coba lagi.');
                            }
                        });
                    });
                });

                loadData();
            });
        </script>

    @endsection
