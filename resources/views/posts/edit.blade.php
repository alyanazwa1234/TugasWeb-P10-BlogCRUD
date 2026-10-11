@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="mb-3">Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $post->title) }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Isi</label>
            <textarea name="body" rows="6"
                      class="form-control @error('body') is-invalid @enderror">{{ old('body', $post->body) }}</textarea>
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection