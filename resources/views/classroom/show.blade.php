@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Classroom</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $classroom->name }}</h5>
            <p class="card-text"><strong>Level:</strong> {{ $classroom->level }}</p>
            <p class="card-text"><strong>Dibuat:</strong> {{ $classroom->created_at->format('d M Y') }}</p>
            <a href="{{ route('classroom.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('classroom.edit', $classroom->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
