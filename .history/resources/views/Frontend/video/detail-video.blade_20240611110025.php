@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
    @include('Frontend.video.header-video')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-5" style="font-size: 15px !important;">

                        <div class="video-container">
                            <iframe width="800" height="500" src="{{ $video->link }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>

                    <div class="">
                        <a href="/bagian-instalasi" class="card-button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
