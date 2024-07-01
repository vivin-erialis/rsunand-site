@extends('Frontend.layouts.main')
@section('title', 'Petunjuk Lokasi')
@section('content')
@include('Frontend.layouts.header')
    {{-- Petunjuk Lokasi --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">

                <h4 class="section-title">{{ $headerStart }}</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
            </div>

            <div class="mt-3">
                <div class="row g-3" style="font-size: 14px;">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills col-md-3 me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Tujuan Rs Unand</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Akses Rs Unand Via Gerbang Utama</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Akses Rs Unand Via Limau Manis</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Akses Menggunakan Trans Padang</button>
                        </div>
                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3033820359447!2d100.45395997358297!3d-0.9205414353328706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7998d0add5d%3A0x30d2b69478a7bb30!2sRumah%20Sakit%20Universitas%20Andalas!5e0!3m2!1sid!2sid!4v1715135853543!5m2!1sid!2sid"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            This is some placeholder content the Profile tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other .nav-powered navigation.
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade col-md-9" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRossqFRwNMF9zo38JzqtDNlGENwJMfPRPUbw&s" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
