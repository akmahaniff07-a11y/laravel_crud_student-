@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $buku->name }}</h5>
            <p class="card-text"><strong>Kategori:</strong> {{ $buku->category }}</p>
            <p class="card-text"><strong>Dibuat:</strong> {{ $buku->created_at->format('d M Y') }}</p>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
