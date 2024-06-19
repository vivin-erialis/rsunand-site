<div class="modal fade" id="addModalSpesialis" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: whitesmoke;">
                <h5 class="modal-title" id="addArticleModalLabel">Tambah Data Dokter Spesialis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Nama Dokter</label>
                                <select id="dokter" name="dokter" class="form-control">
                                    <option selected >Pilih Dokter</option>
                                    @foreach($pegawai as $dr)
                                        <option value="{{ $dr->id }}">{{ $dr->gelar_depan }} {{ $dr->nama }} {{ $dr->gelar_belakang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Spesialisasi</label>
                                <select id="spesialis" name="spesialis" class="form-control">
                                    <option selected >Pilih Spesialis</option>
                                    @foreach($spesialisDokter as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>ID Hfis</label>
                                <input type="number" class="form-control" name="idhfis">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="">
                                <button type="submit"
                                    class="btn btn-success btn-sm w-13 mt-4 mb-3 float-end"> <i class="fa fa-save me-1 text-xs"></i>Simpan</button>
                            </div>
                            <div class="">
                                <a href="#" data-dismiss="modal"
                                        class="btn btn-dark btn-sm w-13 mt-4 mb-3 float-end mx-2"> <i class="fa fa-times me-1 text-xs"></i>Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
