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
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info {
        margin: 10px 0;
        font-size: 15px;
        color: #374151;
    }

    .info strong {
        color: #111827;
        min-width: 100px;
        display: inline-block;
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
        alignils: center;
        gap: 6px;
    }

    .btn-back {
        background: #e5e7eb;
        color: #111827;
    }

    .btn-back:hover {
        background: #d1d5db;
    }

    .btn-edit {
        background: #f59e0b;
        color: #ffffff;
    }

    .btn-edit:hover {
        background: #d97706;
    }
</style>

<div class="container">
    <div class="card">
        <h1>👤 Detail Student</h1>

        <p class="info"><strong>Nama:</strong> {{ $student->name }}</p>
        <p class="info"><strong>Classroom:</strong> {{ $student->classroom->name ?? 'N/A' }}</p>
        <p class="info"><strong>Gender:</strong> {{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
        <p class="info"><strong>Dibuat:</strong> {{ $student->created_at->format('d M Y') }}</p>

        <div class="actions">
            <a href="{{ route('student.index') }}" class="btn btn-back">⬅ Kembali</a>
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-edit">✏ Edit</a>
        </div>
    </div>
</div>
@endsection
