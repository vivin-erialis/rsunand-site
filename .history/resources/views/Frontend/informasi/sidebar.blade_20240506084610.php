<form action="/informasi-dokter" method="GET">
    <select name="spesialis">
        <option value="">Pilih Spesialis</option>
        @foreach ($spesialis as $item)
            <option value="{{$item->title}}">{{$item->title}}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>
