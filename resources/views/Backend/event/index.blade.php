@extends('Backend.layout.main')
@section('title', 'Halaman Data Artikel')
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

                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th class="text-dark text-xs font-weight-semibold">Nama Event</th>
                                    <th class="text-dark text-xs font-weight-semibold">Tanggal</th>

                                    <th class="text-dark text-xs font-weight-semibold">Jam</th>
                                    <th class="text-dark text-xs font-weight-semibold">Lokasi</th>
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
        @include('Backend.event.create')
        @include('Backend.event.edit')
        @include('Backend.event.hapus')
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
                        url: "{{ route('getEvent') }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log('Success:', response); // Debugging
                            let html = '';
                            response.event.forEach(function(event) {
                                html += '<tr>';
                                    html += '<td><p class="px-3 mb-0">' + event.nama_event +
                                    '<br></p></td>';
                                html += '<td><p class="px-3 mb-0">' + event.tanggal_awal + ' s/d ' +
                                    event.tanggal_akhir + '</p></td>';
                                html += '<td><p class="px-3 mb-0">' + event.jam_awal + ' s/d ' + event
                                    .jam_akhir + '</p></td>';
                                html += '<td><p class="px-3 mb-0">' + event.lokasi +
                                    '<br></p></td>';

                                html += '<td>';
                                html +=
                                    '<button class="btn btn-sm btn-warning edit-btn" data-id="' +
                                    event.id +
                                    '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                                html +=
                                    '<button class="btn btn-sm btn-danger mx-2 delete-btn" data-id="' +
                                    event.id +
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


                // Event handler untuk form submit
                $('#artikelForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: '/admin/event',
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

                // Event delegation for edit button
                $(document).on('click', '.edit-btn', function() {
                    var dataId = $(this).data('id');
                    console.log("Edit button clicked, dataId:", dataId); // Debugging
                    $.ajax({
                        url: '/admin/event/' + dataId + '/edit',
                        type: 'GET',
                        success: function(response) {
                            // Isi formulir modal dengan data event yang diterima dari server
                            $('#dataId').val(response.id);
                            $('#namaEvent').val(response.nama_event);
                            $('#lokasiEvent').val(response.lokasi);
                            $('#descEvent').val(response.desc);
                            $('#tanggalAwal').val(response.tanggal_awal);
                            $('#tanggalAkhir').val(response.tanggal_akhir);
                            $('#jamAwal').val(response.jam_awal);
                            $('#jamAkhir').val(response.jam_akhir);

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

                    // var descEvent = editor3.getData();

                    // Siapkan data form
                    var formData = new FormData(this);
                    // formData.set('descEvent', descEvent);

                    var dataId = $('#dataId').val();

                    $.ajax({
                        url: '/admin/event/' + dataId,
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
                            url: '/admin/event/' + artikelId,
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
