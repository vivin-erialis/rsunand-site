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
                                <button class="btn btn-sm btn-dark btn-icon d-flex align-items-center" data-toggle="modal" data-target="#addArticleModal">
                                    <span class="btn-inner--icon">
                                        <i class="fa fa-plus mx-2"></i>
                                    </span>
                                    <span class="btn-inner--text">Tambah Data</span>
                                </button>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Include konten secara langsung -->
                                        @include('Backend.artikel.create')
                                        @include('Backend.artikel.edit')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container p-3">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
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
                                        <td colspan="3" class="text-center"><p class="text-xs px-3 mb-0">Belum ada artikel</p></td>
                                    </tr>
                                @else
                                    @foreach ($artikel as $data)
                                        <tr>
                                            <td>
                                                <a href="artikel/{{ $data->id }}" class="btn btn-sm btn-success"><i class="fa fa-check text-xs me-2"></i>Aktif</a>
                                            </td>
                                            <td>
                                                <p class=" px-3 mb-0">{{ $data->title }} <br></p>
                                            </td>
                                            <td>
                                                <p class=" px-3 mb-0">{!! $data->desc !!}</p>
                                            </td>
                                            {{-- <td>
                                                <p class="text-xs px-3 mb-0">{!! Str::words($data->isi, '15', '...') !!}</p>
                                            </td> --}}
                                            <td>
                                                <div class="d-block my-auto mb-0">
                                                    <button  class="btn btn-sm btn-success" data-toggle="modal" data-bs-target="#editModal"
                                                       ><i class="fa fa-edit text-xs me-2"></i>Edit</button>
                                                    <a href="artikel/{{ $data->id }}" class="btn btn-sm btn-dark"
                                                        ><i class="fa fa-eye text-xs me-2"></i>Detail</a>
                                                    <form action="artikel/{{ $data->id }}" method="post"
                                                        class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" type="submit"
                                                            onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash text-xs me-2"></i>Hapus</button>
                                                    </form>
                                                    <div class="card-header">
                                                        <div class="modal fade" id="editArticleModal<?php echo $artikel['id'] ?>" tabindex="-1" role="dialog"
                                                            aria-labelledby="editArticleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editArticleModalLabel">Edit Data Artikel</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="/admin/artikel/{{$artikel->id}}" method="post"
                                                                            enctype="multipart/form-data">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>Judul Artikel</label>
                                                                                    <div class="mb-3">
                                                                                        <input type="text" class="form-control" placeholder="masukan judul artikel"
                                                                                            aria-label="Name" aria-describedby="name-addon" name="title" value="{{$artikel->title}}">
                                                                                    </div>
                                                                                    <label>Deskripsi Artikel</label>
                                                                                    <div class="mb-3">
                                                                                        <textarea type="text" id="editor" placeholder="masukan deskripsi artikel" aria-label="Name"
                                                                                            aria-describedby="name-addon" name="desc">{{$artikel->desc}}</textarea>
                                                                                    </div>
                                                                                    <label>Isi Artikel</label>
                                                                                    <div class="mb-3">
                                                                                        <textarea type="text" id="editor-2" placeholder="masukan isi artikel" aria-label="Name"
                                                                                            aria-describedby="name-addon" name="isi">{{$artikel->isi}}</textarea>
                                                                                    </div>
                                                                                    <label>Gambar</label>
                                                                                    <input type="file" class="form-control" aria-describedby="email-addon" name="gambar[]" multiple>

                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Kategori Artikel</label>
                                                                                        <select name="kategori_id" id="mySelect" class="form-control">
                                                                                            @foreach ($kategori as $item)
                                                                                                <option value="{{ $item->id }}" {{ $item->id == $artikel->kategori_id ? 'selected' : '' }}>{{ $item->title }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <button type="submit"
                                                                                            class="btn btn-success w-13 mt-4 mb-3 float-end"> <i class="fa fa-save me-1"></i> Simpan</button>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <button type="button" class="btn btn-danger w-13 mt-4 mb-3 float-end mx-2" data-dismiss="modal">
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
                                                    </div>

                                                </div>
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
        {{-- @include('Backend.artikel.create') --}}

    @endsection
