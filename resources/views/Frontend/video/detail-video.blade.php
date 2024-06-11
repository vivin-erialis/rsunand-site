@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
    @include('Frontend.video.header-video')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="video-container">
                    <iframe src="{{ $video->link }}" frameborder="0"
                        allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>
@endsection
