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


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        .slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }
        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 100;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }

        .slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.3s ease-in-out;
        }

        .slides {
            flex: 0 0 auto;
            width: 26%;
        }


        .slides img {
            width: 100% !important;
            height: auto !important;

        }

        @media (max-width: 1200px) {
            .slides {
                flex: 0 0 33.33%;
                /* 3 gambar dalam satu slide */
            }
        }

        @media (max-width: 768px) {
            .slides {
                flex: 0 0 50%;
                /* 2 gambar dalam satu slide */
            }
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 100;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>
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

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="/../assets/js/main.js"></script>
    <script>
        let slideIndex = 0;

        function showSlide(n) {
            const slides = document.querySelectorAll('.slides');
            const slideWidth = slides[0].clientWidth;
            const slider = document.querySelector('.slider');

            if (n >= slides.length) {
                slideIndex = 0;
            } else if (n < 0) {
                slideIndex = slides.length - 1;
            }

            slider.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
        }

        function nextSlide() {
            slideIndex++;
            showSlide(slideIndex);
        }

        function prevSlide() {
            slideIndex--;
            showSlide(slideIndex);
        }

        // Autoplay
        let autoplayInterval = setInterval(nextSlide, 5000);

        // Pause autoplay on button hover
        const buttons = document.querySelectorAll('.prev, .next');
        buttons.forEach(button => {
            button.addEventListener('mouseover', () => {
                clearInterval(autoplayInterval);
            });
            button.addEventListener('mouseleave', () => {
                autoplayInterval = setInterval(nextSlide, 5000);
            });
        });

        // Adjust slides based on screen size
        function adjustSlides() {
            const slides = document.querySelectorAll('.slide');
            const slideWidth = slides[0].clientWidth;
            const slider = document.querySelector('.slider');

            slider.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
        }

        // Initial display and event listener for resize
        showSlide(slideIndex);
        window.addEventListener('resize', adjustSlides);
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
