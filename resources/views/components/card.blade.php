@props(['post'])

<div class="card h-100 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text text-muted">
            {{ \Illuminate\Support\Str::limit($post->body, 100) }}
        </p>
    </div>
    <div class="card-footer d-flex gap-2">
        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Baca</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

        <form method="POST" action="{{ route('posts.destroy', $post) }}"
              onsubmit="return confirm('Yakin hapus post ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
    </div>
</div>