<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\PostServiceInterface;

class PostController extends Controller
{

    private $postService;
    /**
     * Class Constructor
     * @param PostServiceInterface $postService
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the posts.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postService->getPost();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new post.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:posts|min:5',
                'description' => 'required'
            ]
        );
        $post = $this->postService->storePost($request);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->editPost($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $update = $this->postService->updatePost($id, $request);
        return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->postService->destroyPost($id);
        return response()->json($destroy);
    }
}
