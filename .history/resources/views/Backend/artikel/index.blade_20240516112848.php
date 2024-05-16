@extends('Backend.layout.main')
@section('title', 'Halaman Data Artikel')
@section('content')
    @if (Session::has('toastMessage'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="50000">
            <div class="toast-header">
                <strong class="me-auto">Alert</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ Session::get('toastMessage') }}
            </div>
        </div>
    @endif

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
                                    </th>
                                    <th class="text-dark text-xs font-weight-semibold">Deskripsi</th>
                                    <th class="text-dark text-xs font-weight-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($artikel->isEmpty())
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <p class="text-xs px-3 mb-0">Belum ada artikel</p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($artikel as $data)
                                        <tr>
                                            <td>
                                                <a href="" class="btn btn-sm btn-success"><i
                                                        class="fa fa-check text-xs me-2"></i>Aktif</a>
                                            </td>
                                            <td>
                                                <p class=" px-3 mb-0">{{ $data->title }} <br></p>
                                            </td>
                                            <td>
                                                <p class=" px-3 mb-0">{!! $data->desc !!}</p>
                                            </td>

                                            <td>
                                                <button class="btn btn-sm btn-success edit-btn"
                                                    data-id="{{ $data->id }}" data-toggle="modal"
                                                    data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger delete-btn"
                                                    data-id="{{ $data->id }}">Hapus</button>


                                            </td>
                                            {{-- <td>
                                                <button class="btn btn-sm btn-danger edit-btn"
                                                data-id="{{ $data->id }}" data-toggle="modal"
                                                data-target="#deleteModal"> <i class="fa fa-trash text-xs me-2"></i>
                                                Hapus
                                            </button> --}}

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Backend.artikel.create')
    @include('Backend.artikel.edit')
    @include('Backend.artikel.hapus')

@endsection
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('get.data.artikel') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Hapus semua baris tabel kecuali header
                $('#myTable tbody').empty();

                // Tambahkan baris baru untuk setiap artikel
                $.each(response.artikel, function(index, artikel) {
                    var newRow = `<tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-check text-xs me-2"></i>Aktif</a>
                                </td>
                                <td>${artikel.title}</td>
                                <td>${artikel.desc}</td>
                                <td>
                                    <button class="btn btn-sm btn-success edit-btn" data-id="${artikel.id}" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i>Edit</button>
                                    <button type="button" class="btn btn-danger delete-btn" data-id="${artikel.id}">Hapus</button>
                                </td>
                            </tr>`;
                    $('#myTable tbody').append(newRow);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
