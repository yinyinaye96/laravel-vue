<?php

namespace App\Contracts\Services;

interface PostServiceInterface
{
  /**
   * Store data to posts table
   * @param $request 
   */
  public function getPost();

  /**
   * Store data to posts table
   * @param $request 
   */
  public function storePost($request);

  /**
   * Get data for edit from posts table by id
   * @param int $id
   * @return array $post
   */
  public function editPost($id);

  /**
   * Update data to posts table by id 
   * @param int $id
   * @param $request
   */
  public function updatePost($id, $request);

  /**
   * delete data of posts table by id 
   * @param int $id
   */
  public function destroyPost($id);
}
