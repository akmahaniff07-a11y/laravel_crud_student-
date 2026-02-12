<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Daftar Kategori</h2>
        @if (session('success'))
            <div class="alert alert-succes">
                {{ session('success') }}
            </div>
    </div>
    @endif
    
    <form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" placeholder="Nama Kategori">
    </div>
    <h3></h3>
    <button type="submit">Tambah</button>
</form>

    <table border="1" style="width: 100%; margin-top: 20px;">
         <thead>
            <tr>
                <th>Nama Ketegori</th>
                <th>Aksi</th>
            </tr>
         </thead>
   
    <tbody>
        @forelse ($category as $cat)
        <tr>
            <td>{{ $cat->name }}</td>
            <td>
               <button> <a href="{{ route('categories.edit', $cat) }}">Edit</a></button>
                <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display: inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">Maaf Data Masih Kosong</td>
        </tr>
        @endforelse
    </tbody>
     </table>
</body>
</html>