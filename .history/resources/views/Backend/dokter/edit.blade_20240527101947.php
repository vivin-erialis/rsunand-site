<div class="modal fade" id="editDokterModal" tabindex="-1" aria-labelledby="editDokterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDokterModalLabel">Edit Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" action="/admin/dokter/{{$dokter->id}}" method="post" enctype="multipart/form-data">
            @method('PUT')
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
                    aria-label="Name" aria-describedby="name-addon" name="nip" value="{{$dokter->nip}}">
                </div>
                <label>Tempat Lahir</label>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="masukan tempat lahir"
                    aria-label="Name" aria-describedby="name-addon" name="tempat_lahir" value="{{$dokter->tempat_lahir}}">
                </div>
                <label>Tanggal Lahir</label>
                <div class="mb-3">
                  <input type="date" class="form-control" placeholder="masukan tempat lahir"
                    aria-label="Name" aria-describedby="name-addon" name="tanggal_lahir" value="{{$dokter->tanggal_lahir}}">
                </div>
                <label>Pendidikan</label>
                <div class="mb-3">
                  <textarea type="text" id="editor-2" placeholder="masukan pendidikan dokter" aria-label="Name"
                    aria-describedby="name-addon" name="pendidikan">{{$dokter->pendidikan}}</textarea>
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
                    <option value="{{ $item->id }}" {{ $item->id == $dokter->spesialis_id ? 'selected' : '' }}>{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success"> <i class="fa fa-save me-1"></i>Simpan</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-times me-1"></i>Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
