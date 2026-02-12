<div class="container">
    <h1>Edit Classroom</h1>
    <form action="{{ route('classroom.update', $classroom->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Classroom:</label>
            <input type="text" name="name" class="form-control" value="{{ $classroom->name }}" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="level">Level:</label>
            <input type="text" name="level" class="form-control" value="{{ $classroom->level }}" required maxlength="4">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
