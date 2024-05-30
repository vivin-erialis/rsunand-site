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

                <label>Nama</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan nama direksi"
                    aria-label="Name" aria-describedby="name-addon" id="nama" name="nama" >
                </div>
                <label>NIP</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan NIP direksi"
                    aria-label="Name" aria-describedby="name-addon" id="nip" name="nip" >
                </div>
                <label>Tempat Lahir</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan tempat lahir"
                    aria-label="Name" aria-describedby="name-addon" id="tempatLahir" name="tempat_lahir" >
                </div>
                <label>Tanggal Lahir</label>
                <div class="mb-3">
                  <input type="date" class="form-control" placeholder="masukan tempat lahir"
                    aria-label="Name" aria-describedby="name-addon" id="tanggalLahir" name="tanggal_lahir">
                </div>
                <label>Jabatan</label>
                <div class="mb-3">
                  <input type="text" class="form-control" id="jabatan" placeholder="masukan jabatan direksi" aria-label="Name"
                    aria-describedby="name-addon" name="jabatan" ></input>
                </div>
                <label>Foto</label>
                <div class="mb-3">
                  <input type="file" class="form-control" aria-describedby="email-addon"
                    name="foto">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-dark" class="close" data-dismiss="modal" aria-label="Close"></button> <i class="fa fa-times text-xs me-1"></i>Batal</button>
              <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save text-xs me-1"></i>Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
