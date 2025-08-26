<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\TypePlant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Plant as Plants;

class PostController extends Controller
{
    public function index(Request $request)
{
    $categories = TypePlant::all();

    // Base query dengan relasi creator, plant, dan typeplant
    $query = Post::with(['creator', 'plant.typePlant'])
        ->orderByDesc('pst_created_at');

    // Filter berdasarkan kategori (typeplant)
    if ($request->has('category') && $request->category != '') {
        $query->whereHas('plant', function ($q) use ($request) {
            $q->where('tps_id', $request->category);
        });
    }

    // Ambil data post
    $posts = $query->paginate(8);

    return view('posts.index', [
        'posts' => $posts,
        'categories' => $categories
    ]);
}

public function create()
    {
        $plants = Plants::all();
        $typeplants = TypePlant::all();

        return view('posts.create', compact('plants', 'typeplants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pst_content' => 'required',
            'pst_date' => 'required|date',
            'pst_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tps_id' => 'required|exists:typeplants,tps_id',
            'pts_id' => 'required|exists:plants,pts_id',
        ]);

        $imagePath = $request->hasFile('pst_img_path') 
            ? $request->file('pst_img_path')->store('posts', 'public') 
            : null;

        Post::create([
        'pst_content' => $request->pst_content,
        'pst_date' => $request->pst_date,
        'pst_img_path' => $imagePath,
        'pst_description' => $request->pst_description,
        'tps_id' => $request->tps_id,
        'pts_id' => $request->pts_id,
        'pts_id' => $request->pts_id,
        'pst_created_at' => now(),
        'pst_created_by' => Auth::id(),
        ]);


        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

        public function show($id)
    {
        $post = Post::with('plant.typePlant')->findOrFail($id);
        return view('posts.show', compact('post'));

    }


   public function edit($id)
{
    $post = Post::findOrFail($id);
    $typeplants = TypePlant::all();
    $plants = Plants::all();

    return view('posts.edit', compact('post', 'typeplants', 'plants'));
}

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'pst_content' => 'required',
            'pst_date' => 'required|date',
            'pst_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tps_id' => 'required|exists:typeplants,tps_id',
            'pts_id'      => 'required|exists:plants,pts_id'
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
            'tps_id' => $request->tps_id,
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
