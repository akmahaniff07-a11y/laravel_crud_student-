@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 900px;
        margin: 40px auto;
        font-family: Arial, sans-serif;
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        padding: 24px 28px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    h1 {
        font-size: 26px;
        color: #111827;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    input[type="text"], select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        outline: none;
        transition: 0.2s ease;
    }

    input[type="text"]:focus, select:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.15);
    }

    .radio-group {
        display: flex;
        gap: 20px;
        margin-top: 6px;
    }

    .radio-group label {
        font-weight: normal;
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-update {
        background: #f59e0b;
        color: #ffffff;
    }

    .btn-update:hover {
        background: #d97706;
    }

    .btn-back {
        background: #e5e7eb;
        color: #111827;
    }

    .btn-back:hover {
        background: #d1d5db;
    }
</style>

<div class="container">
    <div class="card">
        <h1>✏ Edit Student</h1>

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Student</label>
                <input type="text" name="name" value="{{ $student->name }}" required maxlength="100">
            </div>

            <div class="form-group">
                <label>Classroom</label>
                <select name="classrooms_id" required>
                    <option value="">-- Pilih Classroom --</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" {{ $student->classrooms_id == $classroom->id ? 'selected' : '' }}>
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="gender" value="L" {{ $student->gender == 'L' ? 'checked' : '' }} required>
                        Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="gender" value="P" {{ $student->gender == 'P' ? 'checked' : '' }} required>
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('student.index') }}" class="btn btn-back">⬅ Kembali</a>
                <button type="submit" class="btn btn-update">💾 Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
