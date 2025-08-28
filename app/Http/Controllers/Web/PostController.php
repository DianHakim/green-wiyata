<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\plant;
use App\Models\Location;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Plant as Plants;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::all();

        $query = Post::with(['creator', 'location'])
            ->orderByDesc('pst_created_at');

        if ($request->has('location') && $request->location != '') {
            $query->where('lcn_id', $request->location);
        }

        $posts = $query->paginate(8);

        return view('posts.index', [
            'posts'     => $posts,
            'locations' => $locations,
        ]);
    }

    public function create()
    {
        $plants = Plants::all();
        $locations = Location::all();
        return view('posts.create', compact('locations', 'plants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pst_content'     => 'required|string',
            'pst_date'        => 'required|date',
            'pst_description' => 'nullable|string',
            'pst_img_path'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lcn_id'          => 'required|exists:locations,lcn_id',
            'pts_id'          => 'required|exists:plants,pts_id',
        ]);

        $imagePath = $request->hasFile('pst_img_path')
            ? $request->file('pst_img_path')->store('posts', 'public')
            : null;

        Post::create([
            'pst_content'    => $validated['pst_content'],
            'pst_date'       => $validated['pst_date'],
            'pst_img_path'   => $imagePath,
            'pst_description' => $validated['pst_description'] ?? null,
            'lcn_id'         => $validated['lcn_id'],
            'pts_id'         => $validated['pts_id'],
            'pst_created_by' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::with('location')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $plants = Plants::all();
        $locations = Location::all();

        return view('posts.edit', compact('post', 'plants', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'pst_content'    => 'required|string',
            'pst_date'       => 'required|date',
            'pst_img_path'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pst_description' => 'nullable|string',
            'location_id' => 'required|exists:locations,lcn_id',
            'pts_id'         => 'required|exists:plants,pts_id',
        ]);

        $validated['lcn_id'] = $validated['location_id'];
        unset($validated['location_id']);

        $imagePath = $post->pst_img_path;
        if ($request->hasFile('pst_img_path')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('pst_img_path')->store('posts', 'public');
        }

        $post->update([
            'pst_content'    => $validated['pst_content'],
            'pst_date'       => $validated['pst_date'],
            'pst_img_path'   => $imagePath,
            'pst_description' => $validated['pst_description'] ?? null,
            'lcn_id'    => $validated['lcn_id'],
            'pts_id'         => $validated['pts_id'],
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
