@extends('Backend.layout.main')
@section('title', 'Halaman Edit Data Dokter')

@section('content')
    <div class="container-fluid py-3 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 mb-3">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-2">Edit Data Dokter</h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-header">
                        <form role="form" action="/admin/dokter/{{$dokter->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nama</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan nama dokter"
                                            aria-label="Name" aria-describedby="name-addon" name="nama" value="{{$dokter->nama}}">
                                    </div>
                                    <label>NIP</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="masukan NIP dokter"
                                            aria-label="Name" aria-describedby="name-addon" name="nip" value="{{$dokter-nip}}">
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
                                    <label>Pendidikan</label>
                                    <div class="mb-3">
                                        <textarea type="text" id="editor-2" placeholder="masukan pendidikan dokter" aria-label="Name"
                                            aria-describedby="name-addon" name="pendidikan"></textarea>
                                    </div>
                                    <label>Foto</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" aria-describedby="email-addon"
                                            name="foto">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Spesialis</label>
                                        <select name="spesialis_id" id="mySelect" class="form-control">
                                            @foreach ($spesialis as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="">
                                        <button type="submit"
                                            class="btn btn-success w-13 mt-4 mb-3 float-end"> <i class="fa fa-save me-1"></i>Simpan</button>
                                    </div>
                                    <div class="">
                                        <a href="/admin/dokter"
                                                class="btn btn-danger w-13 mt-4 mb-3 float-end mx-2"> <i class="fa fa-times me-1"></i>Batal
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>
    @endsection
