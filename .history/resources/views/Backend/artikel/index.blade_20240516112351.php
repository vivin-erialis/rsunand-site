@extends('Backend.layout.main')
@section('title', 'Halaman Data Artikel')
@section('content')
    @if (Session::has('toastMessage'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="50000">
            <div class="toast-header">
                <strong class="me-auto">Alert</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ Session::get('toastMessage') }}
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('get.data.artikel') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Hapus semua baris tabel kecuali header
                    $('#myTable tbody').empty();

                    // Tambahkan baris baru untuk setiap artikel
                    response.artikel.forEach(function(data) {
                        var newRow = `<tr>
                                        <td>
                                            <a href="" class="btn btn-sm btn-success"><i class="fa fa-check text-xs me-2"></i>Aktif</a>
                                        </td>
                                        <td>
                                            <p class=" px-3 mb-0">${data.title} <br></p>
                                        </td>
                                        <td>
                                            <p class=" px-3 mb-0">${data.desc}</p>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-success edit-btn" data-id="${data.id}" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit text-xs me-2"></i>Edit</button>
                                            <button type="button" class="btn btn-danger delete-btn" data-id="${data.id}">Hapus</button>
                                        </td>
                                    </tr>`;
                        $('#myTable tbody').append(newRow);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
        @include('Backend.artikel.create')
        @include('Backend.artikel.edit')
        @include('Backend.artikel.hapus')

    @endsection
