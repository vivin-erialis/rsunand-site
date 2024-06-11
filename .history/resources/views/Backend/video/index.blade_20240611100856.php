@extends('Backend.layout.main')
@section('title', 'Halaman Data Video')
@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Slider</h6>
                                <p class="text-sm">Data Slider RS Unand</p>
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
                                    <th class="text-dark text-xs font-weight-semibold">Slider</th>
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
        @include('Backend.slider.create')
        @include('Backend.slider.edit')
        @include('Backend.slider.hapus')
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

                // Fungsi untuk memuat slider
                function loadData() {
                    console.log('Load Data function called'); // Debugging

                    $.ajax({
                        url: "{{ route('getSlider') }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log('Success:', response); // Debugging
                            let html = '';
                            response.slider.forEach(function(slider) {
                                html += '<tr>';
                                html += '<td width="5%">';
                                if (slider.status == 0) {
                                    html +=
                                        '<a href="#" class="btn btn-sm btn-success change-status" data-id="' +
                                        slider.id + '" data-status="1">Aktif</a>';
                                } else {
                                    html +=
                                        '<a href="#" class="btn btn-sm btn-danger change-status" data-id="' +
                                        slider.id + '" data-status="0">Non Aktif</a>';
                                }
                                html += '</td>';
                                html += '<td><p class="px-3 mb-0">' +
                                    '<img src="' + slider.foto_url + // Menggunakan foto_url
                                    '" alt="Foto Slider" style="width:100px; height:auto;"><br>' +
                                    slider.title +
                                    '<br></p></td>';
                                html += '<td><p class="px-3 mb-0">' + slider.desc + '</p></td>';
                                html += '<td>';
                                html +=
                                    '<button class="btn btn-sm btn-warning edit-btn" data-id="' +
                                    slider.id +
                                    '" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i> Edit</button>';
                                html +=
                                    '<button class="btn btn-sm btn-danger mx-2 delete-btn" data-id="' +
                                    slider.id +
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

                    var dataId = $(this).data('id');
                    var newStatus = $(this).data('status');
                    console.log(dataId);

                    $.ajax({
                        url: '/admin/slider/' + dataId + '/status',
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

                            loadData();
                            // Atau Anda bisa melakukan penyesuaian tampilan lain sesuai kebutuhan
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                // Event handler untuk form submit
                $('#addForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: '/admin/slider',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            toastr.success(response.message);

                            // Tutup modal setelah berhasil menambahkan data
                            $('#addModal').modal('hide');

                            $('.modal-backdrop').remove();

                            // Memuat ulang data slider setelah data berhasil disimpan
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


                // Event delegation for delete button
                $(document).on('click', '.edit-btn', function() {
                    var dataId = $(this).data('id');
                    console.log("Edit button clicked, dataId:", dataId); // Debugging
                    $.ajax({
                        url: '/admin/slider/' + dataId + '/edit',
                        type: 'GET',
                        success: function(response) {
                            // Isi formulir modal dengan data artikel yang diterima dari server
                            $('#dataId').val(response.id);
                            $('#judul').val(response.title);
                            $('#deskripsi').val(response.desc);

                            // Setelah semua data dimuat, tampilkan modal
                            $('#editModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                $('#editForm').on('submit', function(event) {
                    event.preventDefault();


                    // Siapkan data form
                    var formData = new FormData(this);

                    var dataId = $('#dataId').val();

                    $.ajax({
                        url: '/admin/slider/' + dataId,
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
                            url: '/admin/slider/' + dataId,
                            type: 'DELETE',
                            success: function(response) {
                                console.log(response);
                                // Tampilkan pesan toast
                                $('#deleteModal').modal('hide');
                                // Memuat ulang data slider setelah slider berhasil dihapus
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
