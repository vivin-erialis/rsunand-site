<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background-color: whitesmoke;">
            <h5 class="modal-title" id="addArticleModalLabel">Tambah Data Direksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Pegawai</label>
                            <select id="pegawai" name="pegawai" class="form-control">
                                <option selected >Pilih Pegawai</option>
                                @foreach($dokter as $dr)
                                    <option value="{{ $dr->id }}">{{ $dr->gelar_depan }} {{ $dr->nama }} {{ $dr->gelar_belakang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <select id="jabatan" name="jabatan" class="form-control">
                                <option selected >Pilih Jabatan</option>
                                @foreach($jabatan as $jbt)
                                    <option value="{{ $jbt->id_jabatan }}">{{ $jbt->desc_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Awal Jabatan</label>
                            <input type="date" class="form-control" name="periode_jabatan_awal" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Akhir Jabatan</label>
                            <input type="date" class="form-control" name="periode_jabatan_akhir" required>
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


