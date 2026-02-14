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
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
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

    .btn-save {
        background: #2563eb;
        color: #ffffff;
    }

    .btn-save:hover {
        background: #1d4ed8;
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
        <h1>➕ Tambah Student</h1>

        <form action="{{ route('student.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Student</label>
                <input type="text" name="name" required maxlength="100">
            </div>

            <div class="form-group">
                <label>Classroom</label>
                <select name="classrooms_id" required>
                    <option value="">-- Pilih Classroom --</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="gender" value="L" required>
                        Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="gender" value="P" required>
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('student.index') }}" class="btn btn-back">⬅ Kembali</a>
                <button type="submit" class="btn btn-save">💾 Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
