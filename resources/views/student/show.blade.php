@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Student</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text"><strong>Classroom:</strong> {{ $student->classroom->name ?? 'N/A' }}</p>
            <p class="card-text"><strong>Gender:</strong> {{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            <p class="card-text"><strong>Dibuat:</strong> {{ $student->created_at->format('d M Y') }}</p>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
