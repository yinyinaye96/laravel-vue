<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\UserServiceInterface;

class UserController extends Controller
{
    private $userService;

    /**
     * Class Constructor
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService) {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the users.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userService->getUser();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new user.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]
        );
        $user = $this->userService->storeUser($request);
        return response()->json($user);
    }

    /**
     * Show the form for editing the user by id.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->editUser($id);
        return response()->json($user);
    }

    /**
     * Update the user in storage by id.
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $update = $this->userService->updateUser($id, $request);
        return response()->json($update);
    }

    /**
     * Remove the user from storage by id.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userService->destroyUser($id);
        return response()->json($user);
    }
}
