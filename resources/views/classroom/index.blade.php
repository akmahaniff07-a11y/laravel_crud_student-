<div class="container">
    <h1>Daftar Classroom</h1>
    <a href="{{ route('classroom.create') }}" class="btn btn-primary">Tambah Classroom</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classrooms as $classroom)
            <tr>
                <td>{{ $classroom->id }}</td>
                <td>{{ $classroom->name }}</td>
                <td>{{ $classroom->level }}</td>
                <td>
                    <button><a href="{{ route('classroom.show', $classroom->id) }}" class="btn btn-info">Lihat</a></button>
                    <button><a href="{{ route('classroom.edit', $classroom->id) }}" class="btn btn-warning">Edit</a></button>
                    <form action="{{ route('classroom.destroy', $classroom->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $classrooms->links() }}
</div>
