<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Bonus: pencarian
        $posts = Post::when($request->q, function ($query, $q) {
                $query->where('title', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'title' => 'required|string|max:200',
            'body'  => 'required|min:10',
        ]);

        Post::create($v);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $v = $request->validate([
            'title' => 'required|string|max:200',
            'body'  => 'required|min:10',
        ]);

        $post->update($v);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();

            return redirect()->route('posts.index')
                ->with('success', 'Post berhasil dihapus!');
        } catch (\Throwable $e) {
            return redirect()->route('posts.index')
                ->with('error', 'Post gagal dihapus!');
        }
    }
}