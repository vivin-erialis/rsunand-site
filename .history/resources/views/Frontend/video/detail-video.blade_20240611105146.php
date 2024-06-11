@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
    @include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-5" style="font-size: 15px !important;">
                    @if ($video->isEmpty())
                        <p>Belum ada video yang tersedia.</p>
                    @else
                        @foreach ($video as $video)
                            <div class="video-container">
                                <iframe width="560" height="315" src="{{ $video->link }}" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            <p><a href="/video/{{$video->url}}"></a></p>
                        @endforeach
                    @endif
                    <div class="">
                        <h2 class=""></h2>
                        <a href="/bagian-instalasi" class="card-button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
