@extends('Backend.layout.main')
@section('title', 'Halaman Tambah Data Direksi')

@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-2">Tambah Data Direksi</h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-header">
                        <form role="form" action="/admin/direksi" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan nama direksi"
                                            aria-label="Name" aria-describedby="name-addon" name="nama" required>
                                    </div>
                                    <label>NIP</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan NIP direksi"
                                            aria-label="Name" aria-describedby="name-addon" name="nip" required>
                                    </div>
                                    <label>Tempat Lahir</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan tempat lahir"
                                            aria-label="Name" aria-describedby="name-addon" name="tempat_lahir" required>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" placeholder="masukan tempat lahir"
                                            aria-label="Name" aria-describedby="name-addon" name="tanggal_lahir" required>
                                    </div>
                                    <label>Foto</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" aria-describedby="email-addon"
                                            name="foto">
                                    </div>
                                    <label>Jabatan</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan tempat lahir"
                                            aria-label="Name" aria-describedby="name-addon" name="jabatan" required>
                                    </div>
                                    <label hidden>Status</label>
                                    <div class="mb-3" hidden>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="menjabat"
                                                value="menjabat" checked>
                                            <label class="form-check-label" for="menjabat">Menjabat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="tidak_menjabat" value="tidak_menjabat">
                                            <label class="form-check-label" for="tidak_menjabat">Tidak Menjabat</label>
                                        </div>
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-success w-13 mt-4 mb-3" style="align-items: right">Simpan</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    @endsection
