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
            <div class="row">
                <div class="form-row">
                    <input type="hidden" id="dataId" name="" value="">

                    <div class="form-group col-md-5">
                        <label>Nama Dokter</label>
                        <select id="dokter" name="dokter" class="form-control">
                            <option selected >Pilih Dokter</option>
                            @foreach($pegawai as $dr)
                                <option value="{{ $dr->id }}" selected>{{ $dr->gelar_depan }} {{ $dr->nama }} {{ $dr->gelar_belakang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Spesialisasi</label>
                        <select id="spesialis" name="spesialis" class="form-control">
                            <option selected >Pilih Spesialis</option>
                            @foreach($spesialis as $sp)
                                <option value="{{ $sp->id }}" selected>{{ $sp->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>ID Hfis</label>
                        <input type="number" class="form-control" id="idhfis" name="idhfis">
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
