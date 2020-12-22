<?php

namespace App\Services;

use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;

class PostService implements PostServiceInterface
{
  /**
   * PostDao
   */
  private $postDao;

  /**
   * Class Constructor
   * @param ostDaoInterface $postDao
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  /**
   * Store data to posts table
   * @param $request 
   */
  public function getPost()
  {
    return $this->postDao->getPost();
  }

  /**
   * Store data to posts table
   * @param $request 
   */
  public function storePost($request)
  {
    return $this->postDao->storePost($request);
  }

  /**
   * Get data for edit from posts table by id
   * @param int $id
   * @return array $post
   */
  public function editPost($id)
  {
    return $this->postDao->editPost($id);
  }

  /**
   * Update data to posts table by id 
   * @param int $id
   * @param $request
   */
  public function updatePost($id, $request)
  {
    return $this->postDao->updatePost($id, $request);
  }

  /**
   * delete data of posts table by id 
   * @param int $id
   */
  public function destroyPost($id)
  {
    return $this->postDao->destroyPost($id);
  }
}
