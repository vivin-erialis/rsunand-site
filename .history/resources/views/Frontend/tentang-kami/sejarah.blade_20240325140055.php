@extends('Frontend.layouts.main')
@section('content')
@include('Frontend.layouts.header')
<div class="container-xxl project py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title"> TENTANG KAMI</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
        </div>
@include('Frontend.tentang-kami.sidebar')
    </div>
</div>

@endsection
