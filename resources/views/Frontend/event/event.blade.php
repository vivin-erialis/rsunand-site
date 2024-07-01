@extends('Frontend.layouts.main')
@section('title', 'Upcoming Event')
@section('content')
    @include('Frontend.layouts.header')
    {{-- Event --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Upcoming Event</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
            </div>
            @if ($data->isEmpty())
                <h4 class="mt-5 text-center">Belum Ada Artikel</h4>
            @endif
            <div class="container-berita">
                @foreach ($data as $item)
                    <div class="card-beritas">
                        @if ($item->gambar)
                        @php
                            $gambarArray = json_decode($item->gambar);
                            if ($gambarArray) {
                                $gambarPertama = reset($gambarArray);
                            }
                        @endphp

                        @if (!empty($gambarPertama))
                            <img loading="lazy" class="card-img" src="{{ asset('/../images/event/' . $gambarPertama) }}">
                        @endif
                    @endif

                        <div class="card-content">

                            <a href="/berita/{{ $item->url }}">
                                <h2 class="card-title">{{ $item->title }}</h2>
                            </a>
                            {{-- <p style="color: #1C7C3D; "><i class="fa fa-calendar me-2"></i>{{ $item->created_at->format('d F Y') }}</p> --}}
                            <p class="card-text">{!! $item->desc !!}</p>
                            <a href="/berita/{{ $item->url }}" class="card-button">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
