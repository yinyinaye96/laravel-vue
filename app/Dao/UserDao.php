<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    /**
     * Get all data from user table 
     * @return array $users
     */
    public function getUser()
    {
        $users = User::all()->toArray();
        return $users;
    }

    /**
     * Store data to users table
     * @param $request 
     */
    public function storeUser($request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        $user->save();
    }

    /**
     * delete data of user table by id 
     * @param int $id
     */
    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    /**
     * Get data for edit from user table by id
     * @param int $id
     * @return array $user
     */
    public function editUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Update data to users table by id 
     * @param int $id
     * @param $request
     */
    public function updateUser($id, $request)
    {
        $user = User::find($id);
        $user->update($request->all());
    }
}
