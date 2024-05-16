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
    // Tangani klik tombol hapus
    $('.delete-btn').click(function() {
        var artikelId = $(this).data('id');
        $('#deleteModal').modal('show');

        // Saat konfirmasi hapus diklik, kirim permintaan penghapusan
        $('#deleteBtn').click(function() {
            $.ajax({
                url: '/admin/artikel/' + artikelId,
                type: 'DELETE',
                success: function(response) {
                    console.log(response);
                    // Tampilkan pesan toast
                    toastr.success(response.message);
                    $('#deleteModal').modal('hide');
                    location.reload(); // Muat ulang halaman setelah berhasil dihapus
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan, silakan coba lagi.');
                }
            });
        });
    });
});


</script>
