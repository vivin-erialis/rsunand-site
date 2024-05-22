<!--
=========================================================
* Corporate UI - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/corporate-ui
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pastikan jQuery dimasukkan -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<link rel="apple-touch-icon" sizes="76x76" href="/../assets/backend/img/apple-icon.png">
<link rel="icon" type="image/png" href="/../assets/backend/img/rsunandlogo.png">
{{-- <link rel="stylesheet" href="/../assets/backend/assets/css/lib/css/normalize.css"> --}}
<link rel="stylesheet" href="/../assets/backend/assets/css/table.css">
{{-- <link rel="stylesheet" href="/../assets/backend/assets/css/lib/css/bootstrap.css"> --}}
{{-- <link rel="stylesheet" href="/../assets/backend/assets/css/datatables.min.css"> --}}
{{-- <link rel="stylesheet" href="/../assets/backend/assets/css/datatables.css"> --}}
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Bootstrap CSS (Opsional) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
{{-- <link rel="stylesheet" href="/../assets/backend/assets/css/buttons.bootstrap.min.css"> --}}
{{-- <link rel="stylesheet" href="/../assets/backend/assets/css/buttons.dataTables.min.css"> --}}

{{-- Fontawesome --}}
{{-- <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css"> --}}
<title>Admin | @yield('title', 'Pendaftaran')</title>

<!--     Fonts and icons     -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
    rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="/../assets/backend/img/rsunandlogo.png" rel="stylesheet" />
<link href="/../assets/backend/img/rsunandlogo.png" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
<link href="/../assets/backend/img/rsunandlogo.png" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="/../assets/backend/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
{{-- CK Editor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
{{-- Data Tables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />

</head>

<body class="g-sidenav-show  bg-gray-100">
    {{-- Sidebar --}}
    @include('Backend.layout.sidebar')
    {{-- End Sidebar --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('Backend.layout.navbar')
        @yield('content')
    </main>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor-2'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!--   Core JS Files   -->
    {{-- <script src="/../assets/backend/assets/js/core/popper.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/core/bootstrap.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/plugins/perfect-scrollbar.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/plugins/smooth-scrollbar.min.js"></script> --}}
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="/../assets/backend/assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script> --}}
    <script src="/../assets/backend/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
    <script src="/../assets/backend/js/plugins/perfect-scrollbar.min.js"></script>

    {{-- datatables --}}
    <script src="/../assets/backend/assets/js/datatables.min.js"></script>
    <script src="/../assets/backend/assets/js/datatables.js"></script>
    {{-- <script src="/../assets/backend/assets/js/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/buttons.bootstrap.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/jszip.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/vfs_fonts.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/buttons.print.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/buttons.colVis.min.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/init/datatables-init.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/multiinsert.js"></script> --}}
    {{-- <script src="/../assets/backend/assets/js/jquerydua.js"></script> --}}
    {{-- <script src="https://cdn.tiny.cloud/1/vvjvlt7hei8al7pa5khj9072zbnz0a12ohzazcwprn14k0cl/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.tiny.cloud/1/3ermfi9smgwonw9urelswo0xbj2yte3esuh0nh2tjz7850xe/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS (Opsional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
