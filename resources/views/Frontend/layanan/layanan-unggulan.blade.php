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
                    <div class="fact-item text-center p-4 h-100pt-0">
                        <div class="fact-icon">
                            {{-- <i class="fa fa-hospital fs-5"></i> --}}
                            <a href="/layanan/layanan-unggulan/{{ $item->url }}">
                                <img  style="width: 100%; height: 100%; object-fit: cover;"
                                    src="{{ asset('/../images/layanan/' . $item->thumbnail) }}">
                            </a>

<<<<<<< Updated upstream
=======
                                @if (!empty($gambarPertama))
                                    <a href="/layanan/layanan-unggulan/{{ $item->url }}">
                                        <img  style="width: 100%; height: 100%; object-fit: cover;"
                                            src="{{ asset('/../images/layanan/' . $gambarPertama) }}">
                                    </a>
                                @endif
                            @endif
>>>>>>> Stashed changes
                        </div>
                        <a href="/layanan/layanan-unggulan/{{ $item->url  }}">
                            <h5 class=" card-title">{{ $item->nama_layanan }}</h5>
                        </a>
                        <p class="">{!! Str::limit($item->desc, 80, '...') !!}</p>
                        <a href="/layanan/layanan-unggulan/{{ $item->url  }}" class="card-button-1">Read More</a>


                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
