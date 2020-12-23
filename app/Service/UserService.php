<?php

namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * UserDao
     */
    private $userDao;

    /**
     * Class Constructor
     * @param UserDaoInterface $userDao
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Get all data from user table 
     * @return array $users
     */
    public function getUser()
    {
        return $this->userDao->getUser();
    }

    /**
     * Store data to users table
     * @param $request 
     */
    public function storeUser($request)
    {
        return $this->userDao->storeUser($request);
    }

    /**
     * delete data of user table by id 
     * @param int $id
     */
    public function destroyUser($id)
    {
        return $this->userDao->destroyUser($id);
    }

    /**
     * Get data for edit from user table by id
     * @param int $id
     * @return array $user
     */
    public function editUser($id)
    {
        return $this->userDao->editUser($id);
    }

    /**
     * Update data to users table by id 
     * @param int $id
     * @param $request
     */
    public function updateUser($id, $request)
    {
        return $this->userDao->updateUser($id, $request);
    }
}
