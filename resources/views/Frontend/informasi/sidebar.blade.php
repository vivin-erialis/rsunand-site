<style>
    select {
        padding: 0.5rem;
        margin-right: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #ccc;
    }

    button {
        padding: 0.5rem 1rem;
        background-color: #1C7C3D;
        color: #fff;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
    }

</style>

<form action="/informasi-dokter" method="GET" class="text-center">
    <select name="spesialis">
        <option value="">Cari Dokter</option>
        @foreach ($spesialis as $item)
            <option value="{{$item->id}}" {{ $item->id == $spesialisasi ? 'selected' : '' }}>{{$item->title}}</option>
        @endforeach
    </select>
    <button type="submit" class="m-1"><i class="fa fa-search me-2"></i>Cari</button>
</form>
