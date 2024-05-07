@extends('Backend.layout.main')
@section('title', 'Halaman Tambah Data Dokter')

@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-2">Tambah Data Dokter</h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-header">
                        <form role="form" action="/admin/dokterS" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nama</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan nama dokter"
                                            aria-label="Name" aria-describedby="name-addon" name="nama" required>
                                    </div>
                                    <label>NIP</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan NIP dokter"
                                            aria-label="Name" aria-describedby="name-addon" name="nip" required>
                                    </div>
                                    <label>Tempat Lahir</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan tempat lahir"
                                            aria-label="Name" aria-describedby="name-addon" name="tempat_lahir" required>
                                    </div>
                                    <label>Tanggal Lahir</label>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" placeholder="masukan tempat lahir"
                                            aria-label="Name" aria-describedby="name-addon" name="tanggal_lahir" required>
                                    </div>
                                    <label>Isi Artikel</label>
                                    <div class="mb-3">
                                        <textarea type="text" id="editor-2" placeholder="masukan isi artikel" aria-label="Name"
                                            aria-describedby="name-addon" name="isi"></textarea>
                                    </div>
                                    <label>Gambar</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" aria-describedby="email-addon"
                                            name="gambar" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kategori Artikel</label>
                                        <select name="kategori_id" id="mySelect" class="form-control">
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
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
