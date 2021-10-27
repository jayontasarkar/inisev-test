<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $repository;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->repository = $postRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'posts' => $this->repository->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $request->website_id,
            'content' => 'required',
            'website_id' => 'required|exists:websites,id'
        ]);

        $post = $this->repository->create($request->all());

        PostPublished::dispatch($post);

        return response()->json([
            'post' => $post,
            'message' => 'Post created successfully'
        ]);
    }
}
