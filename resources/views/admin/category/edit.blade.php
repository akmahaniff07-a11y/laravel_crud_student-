<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" value="{{ $category->name }}" placeholder="Nama Kategori">
    </div>
    <button type="submit">Update</button>
</form>