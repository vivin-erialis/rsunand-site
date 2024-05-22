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
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col mt-1">
                @if (session()->has('pesan'))
                    <div class="alert d-flex align-items-center" style="background-color: #1C7C3D; color: white;"
                        role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif
            </div>
        </div>

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
                                    '" data-toggle="modal" data-target="#deleteModal"> <i class="fa fa-trash text-xs me-2"></i> Delete</button>';
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
                $('.delete-btn').click(function() {
                    var artikelId = $(this).data('id');
                    console.log(artikelId);
                    $('#deleteModal').modal('show');

                    // Saat konfirmasi hapus diklik, kirim permintaan penghapusan
                    $('#deleteBtn').click(function() {
                        $.ajax({
                            url: '/admin/artikel/' + artikelId,
                            type: 'DELETE',
                            success: function(response) {
                                console.log(response);
                                // Tampilkan pesan toast
                                toastr.success(response.message);
                                $('#deleteModal').modal('hide');
                                location
                                    .reload(); // Muat ulang halaman setelah berhasil dihapus
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
