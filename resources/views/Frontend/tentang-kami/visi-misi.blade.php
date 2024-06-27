@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Visi & Misi')
@include('Frontend.layouts.header')
<style>
    .vision-mission-section {
            margin: 20px;
            text-align: start;
        }
        .vision-mission-section h3 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .vision-mission-section p, .vision-mission-section ol {
            font-size: 1.5em;
        }
        .vision-mission-section ol {
            list-style-position: inside;
        }
</style>
<div class="container-xxl project py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title"> Visi & Misi</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
        </div>

        <div>
            <div class="col-lg-12">
                <div class="tab-content w-100">

                    {{-- Visi dan Misi --}}

                    @foreach($visimisi as $data)
                        <span class="vision-mission-section">{!! $data->visi_misi !!}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
