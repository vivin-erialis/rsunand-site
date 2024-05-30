@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
@include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-3">
                    @php
                        // Decode the JSON containing the image file names
                        $gambar = json_decode($berita->gambar);

                        // Split the content into paragraphs
                        $paragraf = explode("</p>", $berita->isi);

                        // Output the first image at the start
                        if (!empty($gambar[0])) {
                            echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[0]) . '">';
                        }

                        // Output the first paragraph
                        if (!empty($paragraf[0])) {
                            echo '<p class="">' . $paragraf[0] . '</p></p>'; // Closing </p> tag
                        }

                        // Output the second image after the first paragraph
                        if (!empty($gambar[1])) {
                            echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[1]) . '">';
                        }

                        // Output the second paragraph if it exists
                        if (!empty($paragraf[1])) {
                            echo '<p class="">' . $paragraf[1] . '</p></p>'; // Closing </p> tag
                        }

                        // Output the third image after the second paragraph
                        if (!empty($gambar[2])) {
                            echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[2]) . '">';
                        }

                        // Output any remaining paragraphs
                        for ($i = 2; $i < count($paragraf); $i++) {
                            echo '<p class="">' . $paragraf[$i] . '</p></p>'; // Closing </p> tag
                        }
                    @endphp
                    <div class="">
                        <h2 class=""></h2>
                        <a href="/berita" class="card-button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
