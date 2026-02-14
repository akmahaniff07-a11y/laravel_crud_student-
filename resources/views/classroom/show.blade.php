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

    .detail-item {
        margin-bottom: 14px;
        font-size: 15px;
        color: #374151;
    }

    .detail-item strong {
        display: inline-block;
        width: 80px;
        color: #111827;
    }

    .actions {
        margin-top: 25px;
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
        <h1>📘 Detail Classroom</h1>

        <div class="detail-item">
            <strong>Nama</strong>: {{ $classroom->name }}
        </div>

        <div class="detail-item">
            <strong>Level</strong>: {{ $classroom->level }}
        </div>

        <div class="detail-item">
            <strong>Dibuat</strong>: {{ $classroom->created_at->format('d M Y') }}
        </div>

        <div class="actions">
            <a href="{{ route('classroom.index') }}" class="btn btn-back">⬅ Kembali</a>
            <a href="{{ route('classroom.edit', $classroom->id) }}" class="btn btn-edit">✏ Edit</a>
        </div>
    </div>
</div>
@endsection
