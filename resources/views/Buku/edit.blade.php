
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Buku:</label>
            <input type="text" name="name" class="form-control" value="{{ $buku->name }}" required>
        </div>
        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" name="category" class="form-control" value="{{ $buku->category }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
    </form>
</div>

