<form action="/informasi-dokter" method="GET">
    <select name="kategori">
        <option value="">Pilih Kategori</option>
        @foreach ($spesialis as $item)
            <option value="">{{$item->title}}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>
