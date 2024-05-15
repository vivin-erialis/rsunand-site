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
                                <a href="artikel/create" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                    <span class="btn-inner--icon">
                                        <i class="fa fa-plus mx-2"></i>
                                    </span>
                                    <span class="btn-inner--text">Tambah Data</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table id="bootstrap-data-table" class="table align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Judul Artikel</th>
                                    {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Deskripsi --}}
                                    {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Isi --}}
                                    </th>
                                    {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7">Deskrispi</th> --}}
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Aksi</th>
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
                                                <p class="text-xs px-3 mb-0">{{ $data->title }}</p>
                                            </td>
                                            {{-- <td>
                                                <p class="text-xs px-3 mb-0">{!! Str::words($data->desc, '15', '...') !!}</p>
                                            </td> --}}
                                            {{-- <td>
                                                <p class="text-xs px-3 mb-0">{!! Str::words($data->isi, '15', '...') !!}</p>
                                            </td> --}}
                                            <td>
                                                <div class="d-block my-auto mb-0">
                                                    <a href="artikel/{{ $data->id }}/edit" class="btn btn-sm mx-1"
                                                        style="background-color:rgb(66, 66, 111); color: white;"><i class="fa fa-eye"></i></a>
                                                    <a href="artikel/{{ $data->id }}" class="btn btn-sm mx-1"
                                                        style="background-color:rgb(217, 151, 60); color: white;">Detail</a>
                                                    <form action="artikel/{{ $data->id }}" method="post"
                                                        class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" type="submit"
                                                            onclick="return confirm('Yakin akan menghapus data?')">Delete</button>
                                                    </form>
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
    @endsection
