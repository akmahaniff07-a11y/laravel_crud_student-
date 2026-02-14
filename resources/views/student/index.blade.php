@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 1100px;
        margin: 40px auto;
        font-family: Arial, sans-serif;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 26px;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn {
        padding: 10px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: 0.2s ease;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-info {
        background: #0ea5e9;
        color: #fff;
    }

    .btn-warning {
        background: #f59e0b;
        color: #fff;
    }

    .btn-danger {
        background: #ef4444;
        color: #fff;
    }

    .btn-info:hover { background: #0284c7; }
    .btn-warning:hover { background: #d97706; }
    .btn-danger:hover { background: #dc2626; }

    .alert {
        background: #ecfdf5;
        color: #065f46;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        border: 1px solid #a7f3d0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 16px rgba(0,0,0,0.06);
    }

    th, td {
        padding: 12px 14px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
        font-size: 14px;
    }

    th {
        background: #f9fafb;
        color: #374151;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
    }

    tr:hover td {
        background: #f3f4f6;
    }

    .actions {
        display: flex;
        gap: 6px;
    }

    .pagination {
        margin-top: 16px;
    }
</style>

<div class="container">
    <div class="header">
        <h1>👨‍🎓 Daftar Student</h1>
        <a href="{{ route('student.create') }}" class="btn btn-primary">➕ Tambah Student</a>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Classroom</th>
                <th>Gender</th>
                <th style="text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->classroom->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($student->gender) }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-info">👁 Lihat</a>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">✏ Edit</a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus student ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">🗑 Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $students->links() }}
    </div>
</div>
@endsection
