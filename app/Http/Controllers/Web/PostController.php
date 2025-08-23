<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   public function index()
{
    $posts = Post::latest()->paginate(8); // <= 8 per halaman
    return view('posts.index', compact('posts'));
}

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pst_content' => 'required',
            'pst_date' => 'required|date',
            'pst_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('pst_img_path')) {
            $imagePath = $request->file('pst_img_path')->store('posts', 'public');
        }

        Post::create([
            'pst_content' => $request->pst_content,
            'pst_date' => $request->pst_date,
            'pst_img_path' => $imagePath,
            'pst_description' => $request->pst_description,
            'pst_created_at' => now(),
            'pst_created_by' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::with('creator')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'pst_content' => 'required',
            'pst_date' => 'required|date',
            'pst_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $post->pst_img_path;
        if ($request->hasFile('pst_img_path')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('pst_img_path')->store('posts', 'public');
        }

        $post->update([
            'pst_content' => $request->pst_content,
            'pst_date' => $request->pst_date,
            'pst_img_path' => $imagePath,
            'pst_description' => $request->pst_description,
            'pst_updated_at' => now(),
            'pst_updated_by' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'pst_deleted_at' => now(),
            'pst_deleted_by' => Auth::id(),
        ]);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

$posts = Post::with('creator')->orderByDesc('pst_created_at')->get();
