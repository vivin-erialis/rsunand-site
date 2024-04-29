@extends('Backend.layout.main')
@section('title', 'Halaman Tambah Data Artikel')

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
                                    <label>Judul Artikel</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan judul artikel"
                                            aria-label="Name" aria-describedby="name-addon" name="title" required>
                                    </div>
                                    <label>Deskripsi Artikel</label>
                                    <div class="mb-3">
                                        <textarea type="text" id="editor" placeholder="masukan deskripsi artikel" aria-label="Name"
                                            aria-describedby="name-addon" name="desc"></textarea>
                                    </div>
                                    <label>Isi Artikel</label>
                                    <div class="mb-3">
                                        <textarea type="text" id="editor" placeholder="masukan isi artikel" aria-label="Name"
                                            aria-describedby="name-addon" name="isi"></textarea>
                                    </div>
                                    <label>Gambar</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" aria-describedby="email-addon"
                                            name="gambar" required>
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
