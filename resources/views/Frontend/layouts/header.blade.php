<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        @foreach ($headerStart as $item)

        <h1 class="display-1 text-white animated slideInDown">{{$item->nama_kategori}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">{{$item->nama_kategori}}</li>
            </ol>
        </nav>
        @endforeach
    </div>
</div>
