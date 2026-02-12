<div class="container">
    <h1>Tambah Student</h1>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Student:</label>
            <input type="text" name="name" class="form-control" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="classrooms_id">Classroom:</label>
            <select name="classrooms_id" class="form-control" required>
                <option value="">Pilih Classroom</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="L" required> Laki-laki
            <input type="radio" name="gender" value="P" required> Perempuan
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
