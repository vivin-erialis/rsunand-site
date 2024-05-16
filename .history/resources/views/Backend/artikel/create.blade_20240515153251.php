<div class="card-header">
    <div class="modal fade" id="addArticleModal" tabindex="-1" role="dialog"
        aria-labelledby="addArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addArticleModalLabel">Tambah Data Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="/admin/artikel" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Judul Artikel</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control"
                                        placeholder="masukan judul artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="title" required>
                                </div>
                                <label>Deskripsi Artikel</label>
                                <div class="mb-3">
                                    <textarea type="text" id="editor" placeholder="masukan deskripsi artikel" aria-label="Name"
                                        aria-describedby="name-addon" name="desc"></textarea>
                                </div>
                                <label>Isi Artikel</label>
                                <div class="mb-3">

