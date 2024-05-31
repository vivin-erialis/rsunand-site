@extends('Frontend.layouts.main')
@section('title', 'Page Not Found')
@section('content')
    {{-- @include('Frontend.layouts.header') --}}
    {{-- Berita --}}
    <div class="container-xxl py-5">
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <h1 class="display-1 text-white animated slideInDown">404 Error</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb text-uppercase mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">404 Error</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
