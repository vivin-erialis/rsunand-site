<!-- resources/views/dokter/index.blade.php -->

<form action="{{ route('dokter.index') }}" method="GET">
    <div class="nav-item dropdown dropdown-dokter text-center">
        <button class="dropdown-toggle toggle-dokter" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Pilih Spesialisasi
        </button>
        <ul class="dropdown-menu menu-dokter" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item item-dokter" href="#" data-value="Dokter Umum">Dokter Umum</a></li>
            <li><a class="dropdown-item item-dokter" href="#" data-value="Dokter Gigi & Mulut">Dokter Gigi & Mulut</a></li>
            <li><a class="dropdown-item item-dokter" href="#" data-value="Spesialis Jantung">Spesialis Jantung</a></li>
            <!-- Tambahkan item dropdown untuk setiap spesialisasi -->
        </ul>
        <input type="hidden" name="kategori" id="kategori"> <!-- Hidden input untuk menyimpan nilai kategori yang dipilih -->
    </div>
    <button type="submit">Filter</button>
</form>
