<div class="container">
    <h1>Edit Student</h1>
    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Student:</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="classrooms_id">Classroom:</label>
            <select name="classrooms_id" class="form-control" required>
                <option value="">Pilih Classroom</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ $student->classrooms_id == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="L" {{ $student->gender == 'L' ? 'checked' : '' }} required> Laki-laki
            <input type="radio" name="gender" value="P" {{ $student->gender == 'P' ? 'checked' : '' }} required> Perempuan
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
