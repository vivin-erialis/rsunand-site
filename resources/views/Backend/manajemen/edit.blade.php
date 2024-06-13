<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Data Direksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" role="form" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" id="dataId" name="" value="">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Bidang</label>
                        <select id="id_bidang" name="id_bidang" class="form-control">
                            <option value="" selected>Pilih Bidang</option>
                            @foreach($bidang as $bid)
                                <option value="{{ $bid->id_bidang }}" selected>{{ $bid->nama_bidang }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Pegawai</label>
                        <select id="pegawai" name="pegawai" class="form-control">
                            <option selected >Pilih Pegawai</option>
                            @foreach($dokter as $dr)
                                <option value="{{ $dr->id }}" selected>{{ $dr->gelar_depan }} {{ $dr->nama }} {{ $dr->gelar_belakang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jabatan</label>
                        <select id="jabatan" name="jabatan" class="form-control">
                            <option selected >Pilih Jabatan</option>
                            @foreach($jabatan as $jbt)
                                <option value="{{ $jbt->id_jabatan }}" selected>{{ $jbt->desc_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Awal Jabatan</label>
                        <input type="date" class="form-control" name="periode_jabatan_awal" id="jabatanAwal" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Akhir Jabatan</label>
                        <input type="date" class="form-control" name="periode_jabatan_akhir" id="jabatanAkhir" required>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-dark" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times text-xs me-1"></i>Batal</button>
              <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save text-xs me-1"></i>Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
