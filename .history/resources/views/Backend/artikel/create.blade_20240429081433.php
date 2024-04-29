@extends('Backend.layout.main')
@section('title', 'Halaman Tambah Data Artikl')

@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-2">Tambah Data Artikel</h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-header">
                        <form role="form" action="/blog" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nama Kegiatan</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan nama kegiatan"
                                            aria-label="Name" aria-describedby="name-addon" name="nama_kegiatan" required>
                                    </div>
                                    <label>Tanggal Kegiatan</label>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" placeholder="" aria-label="Password"
                                            aria-describedby="password-addon" name="tanggal_kegiatan" required>
                                    </div>
                                    <label>Foto</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" aria-describedby="email-addon"
                                            name="foto_kegiatan" required>
                                    </div>
                                    <label>Deskripsi Kegiatan</label>
                                    <div class="mb-3">
                                        {{-- <textarea type="text" id="content" class="form-control" placeholder="masukan deskripsi kegiatan" aria-label="Name"
                                            aria-describedby="name-addon" style="height: 60px" name="deskripsi_kegiatan" required></textarea> --}}
                                        <textarea type="text" id="content" placeholder="masukan deskripsi kegiatan" aria-label="Name"
                                            aria-describedby="name-addon" name="deskripsi_kegiatan"></textarea>

                                    </div>
                                    <label for="">Quote</label>
                                    <div class="mb-3">
                                        <textarea name="quote" class="form-control"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Simpan</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>
    @endsection
