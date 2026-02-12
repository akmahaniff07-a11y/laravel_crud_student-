<div class="container">
    <h1>Tambah Classroom</h1>
    <form action="{{ route('classroom.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Classroom:</label>
            <input type="text" name="name" class="form-control" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="level">Level:</label>
            <input type="text" name="level" class="form-control" required maxlength="4">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
