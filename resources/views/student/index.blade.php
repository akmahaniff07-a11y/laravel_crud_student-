<div class="container">
    <h1>Daftar Student</h1>
    <a href="{{ route('student.create') }}" class="btn btn-primary">Tambah Student</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Classroom</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->classroom->name ?? 'N/A' }}</td>
                <td>{{ $student->gender }}</td>
                <td>
                    <button><a href="{{ route('student.show', $student->id) }}" class="btn btn-info">Lihat</a></button>
                    <button><a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a></button>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
</div>
