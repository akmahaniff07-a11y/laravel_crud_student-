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

    .card h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #111827;
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

    input[type="text"] {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        transition: 0.2s ease;
        outline: none;
    }

    input[type="text"]:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
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
        background: #10b981;
        color: #ffffff;
    }

    .btn-save:hover {
        background: #059669;
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
        <h1>➕ Tambah Classroom</h1>

        <form action="{{ route('classroom.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Classroom</label>
                <input type="text" name="name" required maxlength="100">
            </div>

            <div class="form-group">
                <label>Level</label>
                <input type="text" name="level" required maxlength="4">
            </div>

            <div class="actions">
                <a href="{{ route('classroom.index') }}" class="btn btn-back">⬅ Kembali</a>
                <button type="submit" class="btn btn-save">💾 Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
