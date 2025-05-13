<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id' , Auth::id())->paginate();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories  = Category::pluck('name', 'id');

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'int'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => ['required', 'string'],
        ]);


        if ($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $data['image'] = $imageName;
        }

        $data['user_id'] = Auth::id();


        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories  = Category::pluck('name', 'id');
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'int'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => ['required', 'string'],
        ]);

        if ($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $data['image'] = $imageName;
        }else {
            unset($data['image']);
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::id()){
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post Delete Successfully');
        } else {
            return redirect()->back()->with('error', 'Un authorize access');
        }
    }
}
