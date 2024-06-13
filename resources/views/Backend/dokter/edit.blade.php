<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Data Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" role="form" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <input type="hidden" id="dataId" name="" value="">

                <div class="form-group col-md-4">
                    <label>Gelar Depan</label>
                    <input type="text" class="form-control" placeholder="dr." aria-label="Name" aria-describedby="name-addon" name="gelar_depan" id="gelarDepan">
                </div>
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" aria-label="Name" aria-describedby="name-addon" name="nama" id="nama">
                </div>
                <div class="form-group col-md-4">
                    <label>Gelar Belakang</label>
                    <input type="text" class="form-control" placeholder="" aria-label="Name" aria-describedby="name-addon" name="gelar_belakang" id="gelarBelakang">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>NIP</label>
                    <input type="text" class="form-control" placeholder="masukan NIP dokter" aria-label="Name" aria-describedby="name-addon" name="nip" id="nip">
                </div>
                <div class="form-group col-md-4">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" placeholder="masukan tempat lahir" aria-label="Name" aria-describedby="name-addon" name="tempat_lahir" id="tempatLahir">
                </div>
                <div class="form-group col-md-4">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" placeholder="masukan tempat lahir"aria-label="Name" aria-describedby="name-addon" name="tanggal_lahir" id="tanggalLahir">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Jenis Pegawai</label>
                    <select id="isdokter" name="isdokter" class="form-control">
                        <option selected value="0">Dokter</option>
                        <option value="1">Non Dokter</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                            <label>ID Hfis</label>
                            <input type="number" class="form-control" name="idhfis" id="idhfis">
                        </div>
                <div class="form-group col-md-5">
                    <label>Foto</label>
                    <input type="file" class="form-control" aria-describedby="email-addon"
                            name="foto">
                </div>
            </div>
                <div class="col-md-12">
                    <label>Pendidikan</label>
                    <div class="mb-3">
                        <textarea type="text" placeholder="masukan pendidikan dokter" aria-label="Name"
                            aria-describedby="name-addon" name="pendidikan" id="pendidikan"></textarea>
                    </div>

                    <div class="">
                        <button type="submit"
                            class="btn btn-success btn-sm w-13 mt-4 mb-3 float-end"> <i class="fa fa-save me-1 text-xs"></i>Simpan</button>
                    </div>
                    <div class="">
                        <a data-dismiss="modal" href="#"
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
