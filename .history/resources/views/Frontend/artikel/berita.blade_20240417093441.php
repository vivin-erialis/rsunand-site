@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    @include('Frontend.layouts.header')
    {{-- Berita --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Berita</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <section class="blog-page" id="blog">
                <div class="container mx-auto">
                    <h1 class="font-bold text-center header-title mb-5 text-4xl">OUR BLOG</h1>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 lg:grid-cols-3  justify-between">
                        <div class="mx-2 container-blog">
                            <div>
                                <img src="assets/image/blog-1.jpg" class="blog-image" alt="">
                            </div>
                            <div class="mx-2">
                                <a href="#">
                                    <h2 class="blog-title">Belajar Matematika</h2>
                                </a>
                            </div>
                            <div class="blog-description mx-2">
                                <p class="date-blog">Januari, 23 2024</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, rem magni? Fugiat
                                    odit,
                                    veniam aliquam ad quae iste aut doloribus.
                                </p>
                            </div>
                            <div class="text-right mb-3 mx-3">
                                <button class="button px-5 py-1">Read More</button>
                            </div>

                        </div>
                        <div class="mx-2 container-blog">
                            <div>
                                <img src="assets/image/blog-2.jpg" class="blog-image" alt="">
                            </div>
                            <div class="mx-2">
                                <a href="#">
                                    <h2 class="blog-title">Belajar Matematika</h2>
                                </a>
                            </div>
                            <div class="blog-description mx-2">
                                <p class="date-blog">Januari, 23 2024</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, rem magni? Fugiat
                                    odit,
                                    veniam aliquam ad quae iste aut doloribus.
                                </p>
                            </div>
                            <div class="text-right mb-3 mx-3">
                                <button class="button px-5 py-1">Read More</button>
                            </div>
                        </div>
                        <div class="mx-2 container-blog">
                            <div>
                                <img src="assets/image/blog-3.jpg" class="blog-image" alt="">
                            </div>
                            <div class="mx-2">
                                <a href="#">
                                    <h2 class="blog-title">Belajar Matematika</h2>
                                </a>
                            </div>
                            <div class="blog-description mx-2">
                                <p class="date-blog">Januari, 23 2024</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, rem magni? Fugiat
                                    odit,
                                    veniam aliquam ad quae iste aut doloribus.
                                </p>
                            </div>
                            <div class="text-right mb-3 mx-3">
                                <button class="button px-5 py-1">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
