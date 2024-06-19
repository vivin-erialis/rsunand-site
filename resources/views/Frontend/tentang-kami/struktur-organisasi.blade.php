@extends('Frontend.layouts.main')
@section('title', 'Struktur Organisasi')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"> Struktur Organisasi</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
            </div>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-0 team-items">
                        @forelse ($data as $foto)
                            <div>
                                <img class="img-fluid m-2"
                                    src="{{ empty($foto->struktur_organisasi) ? asset('assets/img/rsunandlogo.png') : asset('images/profile/' . $foto->struktur_organisasi) }}">
                            </div>
                        @empty
                            <h4 class="text-center"><strong>Data Belum Tersedia</strong></h4>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
