@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
@include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-5" style="font-size: 15px !important;">
                    @php
                        // Decode the JSON containing the image file names
                        $gambar = json_decode($lmiah->gambar);

                        // Split the content into paragraphs
                        $paragraf = explode("</p>", $lmiah->isi);

                        // Track the image index
                        $gambarIndex = 0;

                        // Output the first image at the start
                        if (!empty($gambar[$gambarIndex])) {
                            echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[$gambarIndex]) . '">';
                            $gambarIndex++;
                        }

                        // Output paragraphs and insert images at desired points
                        for ($i = 0; $i < count($paragraf); $i++) {
                            echo '<p class="">' . $paragraf[$i] . '</p>'; // Closing </p> tag

                            // Insert images at specific paragraph indices
                            if ($i == 2 && !empty($gambar[$gambarIndex])) {
                                // Output the second image after the second paragraph
                                echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[$gambarIndex]) . '">';
                                $gambarIndex++;
                            } elseif ($i == 4 && !empty($gambar[$gambarIndex])) {
                                // Output the third image after the fourth paragraph
                                echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[$gambarIndex]) . '">';
                                $gambarIndex++;
                            }
                        }

                        // Output any remaining images if needed
                        while ($gambarIndex < count($gambar)) {
                            echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[$gambarIndex]) . '">';
                            $gambarIndex++;
                        }
                    @endphp
                    <div class="">
                        <h2 class=""></h2>
                        <a href="/ilmiah" class="card-button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
