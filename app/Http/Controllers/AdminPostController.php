<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(): View|Factory
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store(): RedirectResponse
    {
        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect("/")->with('success', 'Your new post was created!');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title'=> ['required', 'min:5', 'max:255'],
            'slug'=> ['required', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt'=> ['required'],
            'body'=> ['required'],
            'category_id'=> ['required',Rule::exists('categories', 'id')],
            'thumbnail'=> $post->exists ? ['image'] : ['required', 'image'],
        ]);
    }

    public function update(Post $post): RedirectResponse
    {
        $attributes = $this->validatePost($post);
        if(request()->file('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success', 'Your post was updated!');

    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return back()->with('success', 'Your post was deleted!');
    }
}
