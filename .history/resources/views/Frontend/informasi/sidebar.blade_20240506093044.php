<style>
    .container-xxl {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        display: flex;
        align-items: center;
    }

    select {
        padding: 0.5rem;
        margin-right: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #ccc;
    }

    button {
        padding: 0.5rem 1rem;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    button:hover {
        background-color: #1C7C3D;
    }
</style>

<form action="/informasi-dokter" method="GET">
    <select name="spesialis">
        <option value="">Tampilkan Semua</option>
        @foreach ($spesialis as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>
