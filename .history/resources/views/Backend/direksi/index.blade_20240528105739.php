@extends('Backend.layout.main')
@section('title', 'Halaman Data Direksi')
@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Direksi</h6>
                                <p class="text-sm">Data Direksi RS Unand</p>
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
                        <table id="myTable" class="table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-dark text-xs font-weight-semibold">Data</th>
                                    <th class="text-dark text-xs font-weight-semibold">Jabatan</th>
                                    </th>
                                    <th class="text-dark text-xs font-weight-semibold">Status</th>
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
        @include('Backend.direksi.create')
        {{-- @include('Backend.dokter.edit') --}}
        {{-- @include('Backend.dokter.hapus') --}}
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

                // Fungsi untuk memuat
                function loadData() {

                    $.ajax({
                        url: "{{ route('getDireksi') }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log('Success:', response.direksi); // Debugging
                            let html = '';
                            response.direksi.forEach(function(direksi) {
                                html += '<tr>';
                                if (article.status == 0) {
                                    html +=
                                        '<a href="#" class="btn btn-sm btn-success change-status" data-id="' +
                                        article.id + '" data-status="1">Aktif</a>';
                                } else {
                                    html +=
                                        '<a href="#" class="btn btn-sm btn-danger change-status" data-id="' +
                                        article.id + '" data-status="0">Non Aktif</a>';
                                }

                                html += '<td><p class="px-3 mb-0">' +
                                    '<img src="' + direksi.foto_url + // Menggunakan foto_url
                                    '" alt="Foto Dokter" style="width:100px; height:auto;"><br>' +
                                    direksi.nama + '<br>' + direksi.nip + '<br>' + direksi
                                    .tempat_lahir + `/` + direksi.tanggal_lahir +
                                    '<br></p></td>';
                                html += '<td><p class="px-3 mb-0">' + direksi.jabatan +
                                    '</p></td>';

                                html += '<td>';
                                html +=
                                    '<button class="btn btn-sm btn-warning edit-btn" data-id="' +
                                    direksi.id +
                                    '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                                html +=
                                    '<button class="btn btn-sm btn-danger mx-2 delete-btn" data-id="' +
                                    direksi.id +
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

                // tambah data direksi
                $('#addForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: '/admin/direksi',
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
                                toastr.error('Terjadi kesalahan, silakan coba lagi.');
                                console.log('Full response:', response);
                            }
                        }
                    });
                });
                // end tambah data dokter


                // klik button edit data
                // $(document).on('click', '.edit-btn', function() {
                //     var dataId = $(this).data('id');
                //     console.log("Edit button clicked, dataId:", dataId); // Debugging
                //     $.ajax({
                //         url: '/admin/dokter/' + dataId + '/edit',
                //         type: 'GET',
                //         success: function(response) {
                //             // Isi formulir modal dengan data artikel yang diterima dari server
                //             $('#dataId').val(response.id);
                //             $('#nama').val(response.nama);
                //             $('#nip').val(response.nip);
                //             $('#tempatLahir').val(response.tempat_lahir);
                //             $('#tanggalLahir').val(response.tanggal_lahir);
                //             $('#pendidikan').val(response.pendidikan);

                //             // // Atur nilai menggunakan metode setData dari CKEditor setelah CKEditor sepenuhnya diinisialisasi

                //             if (window.editor3) {
                //                 window.editor3.setData(response.pendidikan);
                //             }

                //             $('#spesialisId').val(response.spesialis_id);

                //             // Setelah semua data dimuat, tampilkan modal
                //             $('#editModal').modal('show');
                //         },
                //         error: function(xhr, status, error) {
                //             console.error(xhr.responseText);
                //         }
                //     });
                // });
                // end klik button edit data

                // simpan perubahan data
                // $('#editForm').on('submit', function(event) {
                //     event.preventDefault();

                //     var pendidikan = editor3.getData();

                //     // Siapkan data form
                //     var formData = new FormData(this);
                //     formData.set('pendidikan', pendidikan);

                //     var dataId = $('#dataId').val();

                //     $.ajax({
                //         url: '/admin/dokter/' + dataId,
                //         method: 'POST', // Sesuaikan dengan metode yang digunakan di rute, bisa 'PUT' atau 'PATCH'
                //         data: formData,
                //         contentType: false,
                //         processData: false,
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         success: function(response) {
                //             // alert('Artikel berhasil diperbarui!');
                //             $('#editModal').modal('hide');
                //             $('.modal-backdrop').remove();
                //             toastr.success(response.message);
                //             loadData();
                //         },
                //         error: function(xhr) {
                //             var errors = xhr.responseJSON.errors;
                //             var errorMessage = '';
                //             for (var key in errors) {
                //                 if (errors.hasOwnProperty(key)) {
                //                     errorMessage += errors[key][0] + '\n';
                //                 }
                //             }
                //             alert('Terjadi kesalahan:\n' + errorMessage);
                //         }
                //     });
                // });
                // end simpan perubahan data

                // delete data
                // $(document).on('click', '.delete-btn', function() {
                //     var dataId = $(this).data('id');
                //     console.log("Delete button clicked, dataId:", dataId); // Debugging
                //     $('#deleteModal').modal('show');

                //     // Saat konfirmasi hapus diklik, kirim permintaan penghapusan
                //     $('#deleteBtn').off('click').on('click', function() {
                //         $.ajax({
                //             url: '/admin/dokter/' + dataId,
                //             type: 'DELETE',
                //             success: function(response) {
                //                 console.log(response);
                //                 // Tampilkan pesan toast
                //                 $('#deleteModal').modal('hide');
                //                 $('.modal-backdrop').remove();
                //                 toastr.success(response.message);

                //                 loadData();
                //             },
                //             error: function(xhr, status, error) {
                //                 console.error(xhr.responseText);
                //                 alert('Terjadi kesalahan, silakan coba lagi.');
                //             }
                //         });
                //     });
                // });
                // end delete data
                loadData();
            });
        </script>

    @endsection
