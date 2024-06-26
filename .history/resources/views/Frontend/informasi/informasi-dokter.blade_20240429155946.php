@extends('Frontend.layouts.main')
@section('title', 'Informasi Dokter')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"> DOKTER KAMI</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            @include('Frontend.informasi.sidebar')
            <div class="tab-content w-100">
                <div class="tab-pane fade">

                </div>
            </div>
            <div class="row">
                <div class="col-md-5" style="background-color: whitesmoke;">
                    <div class="shuffle-btn-group">
                        <label class="active" for="all">
                            <input type="radio" name="shuffle-filter" id="all" value="all"
                                checked="checked">Tampilkan Semua
                        </label>

                        @php
                            $spesialis = App\models\Spesialis::get();
                        @endphp

                        @forelse ($spesialis as $s)
                            <div class="mb-2">
                                <label for="{{ $s->title }}" style="height: 30px">
                                    <input type="radio" name="shuffle-filter" id="{{ $s->title }}"
                                        value="{{ $s->title }}">
                                    <h2
                                        style="font-size: 13px; font-weight: normal !important; text-transform: capitalize !important; margin-top: -12px">
                                        <i class="fa fa-check mr-1"></i>
                                        {{ $s->title }}
                                    </h2>
                                </label>
                            </div>
                        @empty
                            Tidak ada Data
                        @endforelse

                    </div><!-- project filter end -->
                </div>

                <div class="col-md-7">
                    <h6 class="mb-3 mt-1" style="font-size: 14px"> <i class="fa fa-list mr-1"></i>
                        Daftar Anggota Divisi
                    </h6>
                    <div class="row shuffle-wrapper mb-4 mt-1">
                        <div class="col-1 shuffle-sizer"></div>
                        @forelse ($dokter as $a)
                            <div class="col-lg-6 col-md-6 shuffle-item"  style="margin-top: -20px; padding:"
                                data-groups="[&quot;{{ $a->spesialis->title }}&quot;]">
                                <div class="ts-team-wrapper mx-2">
                                    <div class="author-box d-nlock d-sm-flex">
                                            <div class="author-info">

                                                {{-- <h1 style="font-size: 17px; color: black;"> <i
                                                        class="fa fa-user-tie mr-2"></i>{{ $a->nama }}</h1> --}}
                                                <h6 style="font-size: 12px; text-transform: uppercase; color:black;"><i
                                                    class="fa fa-user-tie mr-2"></i>{{ $a->nama }}</h6>


                                            </div>
                                    </div> <!-- Author box end -->
                                </div><!--/ Team wrapper end -->
                            </div><!-- shuffle item 1 end -->

                        @empty
                            Tidak Ada Data
                        @endforelse

                    </div>
                    {{-- <div class="d-flex justify-content-center">
                        {{ $anggota->links('vendor.pagination.bootstrap-4') }}
                    </div> --}}

                </div>
            </div>
            <div class="row shuffle-wrapper mb-4 mt-1">
                <div class="col-1 shuffle-sizer"></div>
                @forelse ($dokter as $a)
                    <div class="col-lg-6 col-md-6 shuffle-item"  style="margin-top: -20px; padding:"
                        data-groups="[&quot;{{ $a->spesialis->title }}&quot;]">
                        <div class="ts-team-wrapper mx-2">
                            <div class="author-box d-nlock d-sm-flex">
                                    <div class="author-info">

                                        {{-- <h1 style="font-size: 17px; color: black;"> <i
                                                class="fa fa-user-tie mr-2"></i>{{ $a->nama }}</h1> --}}
                                        <h6 style="font-size: 12px; text-transform: uppercase; color:black;"><i
                                            class="fa fa-user-tie mr-2"></i>{{ $a->nama }}</h6>
                                        {{-- <h6 style="font-size: 11px; text-transform: capitalize; color:grey;">Jabatan :
                                            {{ $a->jabatan->nama_jabatan }}</h6> --}}

                                    </div>
                            </div> <!-- Author box end -->
                        </div><!--/ Team wrapper end -->
                    </div><!-- shuffle item 1 end -->

                @empty
                    Tidak Ada Data
                @endforelse

            </div>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-0 team-items">
                        @forelse ($dokter as $data)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="team-item position-relative">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="../images/dokter/{{ $data->foto }}"
                                            alt="{{ $data->foto }}">
                                        <div class="team-social text-center">
                                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="bg-light text-center p-4">
                                        <h3 class="mt-2">{{ $data->nama }}</h3>
                                        <span class="text-primary">Dokter {{ $data->spesialis->title }}</span>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <p>Data belum tersedia</p>
                        @endforelse





                    </div>
                </div>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">


            </div>
        </div>
    </div>
@endsection
