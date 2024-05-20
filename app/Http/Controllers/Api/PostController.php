<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
 * Display a listing of the resource.
 */
public function index(Request $request)
{
    // Show data based on logged user
    $posts = Post::where('user_id', $request->user()->id)->get();

    return $posts;
}

    /**
    * Display a listing of the resource.
    */
    public function all(Request $request)
    {
        // Show all posts
        return Post::all();
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(PostRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if the image is present in the request and store it if it is
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('post', 'public');
        }

        // Create the post with the validated data
        $user = Post::create($validated);

        return $user;
    }
}
