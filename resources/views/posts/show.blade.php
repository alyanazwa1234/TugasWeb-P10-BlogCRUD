@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">Dibuat {{ $post->created_at->format('d M Y H:i') }}</p>

    <div class="mb-4" style="white-space: pre-line;">{{ $post->body }}</div>

    <div class="d-flex gap-2">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Kembali</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>

        <form method="POST" action="{{ route('posts.destroy', $post) }}"
              onsubmit="return confirm('Yakin hapus post ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
        </form>
    </div>
@endsection