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
    <link rel="apple-touch-icon" sizes="76x76" href="/../assets/backend/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/../assets/backend/img/favicon.png">
    <title>
        Halaman Login - Admin
    </title>
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
        rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/../assets/backend/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/../assets/backend/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="/../assets/backend/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/../assets/backend/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content  mt-0">
        <div class="card card-plain mt-4">

            @if (session()->has('errorLogin'))
                <div class="alert alert-danger" role="alert" style="border-radius: 30px;">
                    {{ session('errorLogin') }}
            @endif
        </div>
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-4">
                                <div class="card-header pb-0 text-center mb-4 bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6">Login Admin</h3>
                                    <p class="mb-0">Rumah Sakit Universitas Andalas</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="/login" method="post">
                                        @csrf
                                        <label>Email Address</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control"
                                                placeholder="Enter your email address" aria-label="Email"
                                                aria-describedby="email-addon" name="email">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon" name="password">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>

                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-xs mx-auto">
                                        Don't have an account?
                                        <a href="javascript:;" class="text-dark font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="/../assets/backend/js/core/popper.min.js"></script>
    <script src="/../assets/backend/js/core/bootstrap.min.js"></script>
    <script src="/../assets/backend/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/../assets/backend/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="/../assets/backend/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>
