<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the required fields
        $this->validate($request, [
            "name" => "required",
            "slug" => "required|unique:posts",
        ]);
    
        // Add the user_id to the data array
        $data = $request->all();
        $data['user_id'] = auth()->id(); // Or any appropriate user ID
    
        // Create the post using the modified data array
        $post = Post::create($data);
    
        $file = $request->file('file');
        if (!empty($file)) {
            $nombre = time() . "_" . $file->getClientOriginalName();
            $imagenes = $file->storeAs('public/uploads', $nombre);
            $url = Storage::url($imagenes);
    
            $post->image()->create(['url' => $url]);
        }
    
        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('author',$post);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));

    }

   
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author',$post);
        $post->update($request->all());

        $file = $request->file('file');
        if (!empty($file)) {

            $nombre =  time() . "_" . $file->getClientOriginalName();
            $imagenes = $file->storeAs('public/uploads', $nombre);
            $url = Storage::url($imagenes);
            if($post->image->url){
                unlink(public_path().$post->image->url);
              
                $post->image->update([ 'url' => $url]);
            } else {
                $post->image()->create([ 'url' => $url]);
            }
        }
        return redirect()->route('admin.posts.edit', $post)->with('success','Post actualizado correctamente');
    }

    public function destroy(Post $post){
        $this->authorize('author',$post);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','El post ha sido eliminado exitosamente');
    }
}
