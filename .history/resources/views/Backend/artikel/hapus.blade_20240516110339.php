<!-- Form Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus artikel ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="deleteBtn">Hapus</button>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function() {
    $('.hapus-artikel').click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/hapus-artikel/' + id,
            type: 'DELETE',
            success: function(response) {
                // Tampilkan pesan toast menggunakan library tertentu, misalnya Toastr
                toastr.success(response.message);

                // Lakukan apa pun yang diperlukan setelah berhasil menghapus, misalnya, perbarui daftar artikel
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan, silakan coba lagi.');
            }
        });
    });
});

</script>
