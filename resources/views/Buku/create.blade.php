
<div class="container">
    <h1>Tambah Buku</h1>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Buku:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
    </form>
</div>
