@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Layanan')
@include('Frontend.layouts.header')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">

            <h4 class="section-title">{{ $headerStart }}</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
        </div>
        @if ($layanan->isEmpty())
            <h4 class="mt-5 text-center">Belum Ada Data</h4>
        @endif
        <div class="mt-3">
            <div class="row g-3">
                @foreach ($layanan as $item)
                    <div class="col-lg-3 col-md-6 wow fadeInUp mt-3" data-wow-delay="0.1s">
                        <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                            <div class="fact-icon">
                                {{-- <i class="fa fa-hospital fs-5"></i> --}}
                                @if ($item->gambar)
                                    @php
                                        $gambarArray = json_decode($item->gambar);
                                        if ($gambarArray) {
                                            $gambarPertama = reset($gambarArray);
                                        }
                                    @endphp

                                    @if (!empty($gambarPertama))
                                        <a href="/layanan/layanan-lainnya/{{ $item->url }}">
                                            <img style=" width: 90%"
                                                src="{{ asset('/../images/layanan/' . $gambarPertama) }}">
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <a href="/layanan/layanan-kesehatan/{{ $item->url }}">
                                <h5 class="mb-3 card-title">{{ $item->nama_layanan }}</h5>
                            </a>
                            <p class="mb-0">{{ Str::limit($item->desc, 80, '...') }}.</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
