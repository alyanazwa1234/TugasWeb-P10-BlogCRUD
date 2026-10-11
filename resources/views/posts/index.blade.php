@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <h1 class="mb-3">Semua Post</h1>

    {{-- Bonus: form pencarian --}}
    <form method="GET" action="{{ route('posts.index') }}" class="row g-2 mb-4">
        <div class="col-md-9">
            <input type="text" name="q" class="form-control"
                   placeholder="Cari judul post..." value="{{ request('q') }}">
        </div>
        <div class="col-md-3 d-grid">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    <div class="row g-3">
        @forelse ($posts as $p)
            <div class="col-md-4">
                <x-card :post="$p" />
            </div>
        @empty
            <p class="text-muted">Belum ada post.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection