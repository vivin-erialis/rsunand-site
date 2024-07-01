@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Layanan')
@include('Frontend.layouts.header')
<div class="container-xxl py-5">
    <div class="container">
        <div class="mt-3">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp mt-3" data-wow-delay="0.1s">
                    <div class="fact-item text-center p-4 h-100pt-0">
                        <div class="fact-icon">
                            {{-- <i class="fa fa-hospital fs-5"></i> --}}
                            <a href="/layanan/layanan-unggulan/">
                                <img  style="width: 100%; height: 100%; object-fit: cover;"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCaUxTY9DvaRtubhKDS8-P_bzpa9oxyPTFIg&s">
                            </a>

                        </div>
                        <a href="/layanan/layanan-unggulan/">
                            <h5 class=" card-title">Mushalla</h5>
                        </a>
                        <p class="">s</p>
                        <a href="/layanan/layanan-unggulan/" class="card-button-1">Read More</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
