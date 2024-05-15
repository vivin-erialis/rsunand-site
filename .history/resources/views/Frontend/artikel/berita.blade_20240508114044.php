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
            @if ($artikel->isEmpty())
                <h4 class="mt-5 text-center">Belum Ada Artikel</h4>
            @endif
            <div class="container-berita">
                @foreach ($artikel as $item)
                    <div class="card">
                        @if(isset($item->gambar[0])) <!-- Pilih gambar pertama -->
                        <img loading="lazy" class="card-img" src="{{ asset('/../images/artikel/' . $item->gambar[0]) }}">
                    @elseif(isset($item->gambar[1])) <!-- Jika tidak ada gambar pertama, pilih gambar kedua -->
                        <img loading="lazy" class="card-img" src="{{ asset('/../images/artikel/' . $item->gambar[1]) }}">
                    @elseif(isset($item->gambar[2])) <!-- Jika tidak ada gambar pertama dan kedua, pilih gambar ketiga -->
                        <img loading="lazy" class="card-img" src="{{ asset('/../images/artikel/' . $item->gambar[2]) }}">
                    @else <!-- Jika tidak ada gambar yang tersedia, gunakan gambar placeholder atau kosong -->
                        <img loading="lazy" class="card-img" src="{{ asset('/path/to/placeholder.jpg') }}">
                    @endif

                        <div class="card-content">
                            <div class="me-2 mb-3" style="color: #1C7C3D">
                                <span style="font-size: 12px"class="post-author">
                                    {{ $item->kategori->title }} | </a>
                                </span>
                                <span style="font-size: 12px" class="post-meta-date"><i
                                        class="far fa-calendar me-2"></i>{{ Carbon\carbon::parse($item->created_at)->isoFormat('D MMMM, Y') }}</span>

                            </div>
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
