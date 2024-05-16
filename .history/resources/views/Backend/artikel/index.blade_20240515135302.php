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
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>City</th>
                                    <th>Occupation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Name">John Doe</td>
                                    <td data-label="Age">30</td>
                                    <td data-label="City">New York</td>
                                    <td data-label="Occupation">Software Engineer</td>
                                </tr>
                                <tr>
                                    <td data-label="Name">Jane Smith</td>
                                    <td data-label="Age">25</td>
                                    <td data-label="City">San Francisco</td>
                                    <td data-label="Occupation">Graphic Designer</td>
                                </tr>
                                <tr>
                                    <td data-label="Name">Sam Johnson</td>
                                    <td data-label="Age">35</td>
                                    <td data-label="City">Los Angeles</td>
                                    <td data-label="Occupation">Product Manager</td>
                                </tr>
                                <tr>
                                    <td data-label="Name">Lisa Brown</td>
                                    <td data-label="Age">28</td>
                                    <td data-label="City">Chicago</td>
                                    <td data-label="Occupation">Marketing Specialist</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
