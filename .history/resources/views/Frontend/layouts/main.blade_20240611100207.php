<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | RS Universitas Andalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/../assets/img/rsunandlogo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <img class="position-absolute top-50 start-50 translate-middle" src="/../assets/img/icons/icon-1.png"
            alt="Icon">
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('Frontend.layouts.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('Frontend.layouts.navbar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    @yield('content')
    <!-- Carousel End -->

    <!-- Footer Start -->
    @include('Frontend.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/../assets/lib/wow/wow.min.js"></script>
    <script src="/../assets/lib/easing/easing.min.js"></script>
    <script src="/../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/../assets/lib/counterup/counterup.min.js"></script>
    <script src="/../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="/../assets/js/main.js"></script>
</body>

</html>
