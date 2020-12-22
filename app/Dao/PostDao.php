<?php

namespace App\Dao;

use App\Contracts\Dao\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{

  /**
   * Get all data from posts table 
   * @return array $posts
   */
  public function getPost()
  {
    $posts = Post::all()->toArray();
    return $posts;
  }

  /**
   * Store data to posts table
   * @param $request 
   */
  public function storePost($request)
  {
    $post = new Post([
      'title' => $request->input('title'),
      'description' => $request->input('description')
    ]);
    $post->save();
  }

  /**
   * Get data for edit from posts table by id
   * @param int $id
   * @return array $post
   */
  public function editPost($id)
  {
    $post = Post::find($id);
    return $post;
  }

  /**
   * Update data to posts table by id 
   * @param int $id
   * @param $request
   */
  public function updatePost($id, $request)
  {
    $post = Post::find($id);
    $post->update($request->all());
  }

  /**
   * delete data of posts table by id 
   * @param int $id
   */
  public function destroyPost($id)
  {
    $post = Post::find($id);
    $post->delete();
  }
}
