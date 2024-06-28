@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Perkembangan Rumah Sakit Univeristas Andalass')
@include('Frontend.layouts.header')
<div class="container-xxl project py-5">
    <div class="container">
        <div>
            <div class="col-lg-12">
                <div class="tab-content w-100">

                    <!-- @foreach($perkembangan as $data)
                        <span class="vision-mission-section">{!! $data->perkembangan !!}</span>
                    @endforeach -->
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        @foreach($perkembangan as $index => $data)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-heading{{ $index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $index }}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{ $index }}">
                                        {!! $data->title_perkembangan !!}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{ $index }}" data-bs-parent="#accordionPanelsStayOpenExample">
                                    <div class="accordion-body">
                                        {!! $data->desc_perkembangan !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pastikan hanya satu panel yang terbuka saat load pertama
        var accordion = document.getElementById("accordionPanelsStayOpenExample");
        var items = accordion.querySelectorAll(".accordion-item");

        items.forEach(function(item, index) {
            var button = item.querySelector(".accordion-button");
            var collapse = item.querySelector(".accordion-collapse");

            // Tutup semua kecuali yang pertama
            if (index !== 0) {
                button.classList.add('collapsed');
                collapse.classList.remove('show');
            } else {
                button.classList.remove('collapsed');
                collapse.classList.add('show');
            }
        });
    });

</script>
