<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Authentication
 */
interface UserDaoInterface
{
    /**
     * Get all data from user table 
     * @return array $users
     */
    public function getUser();

    /**
     * Store data to users table
     * @param $request 
     */
    public function storeUser($request);

    /**
     * delete data of user table by id 
     * @param int $id
     */
    public function destroyUser($id);

    /**
     * Get data for edit from user table by id
     * @param int $id
     * @return array $user
     */
    public function editUser($id);

    /**
     * Update data to users table by id 
     * @param int $id
     * @param $request
     */
    public function updateUser($id, $request);
}
