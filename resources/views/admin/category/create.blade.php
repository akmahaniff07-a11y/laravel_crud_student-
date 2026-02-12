<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" placeholder="Nama Kategori">
    </div>
    <button type="submit">Tambah</button>
</form>