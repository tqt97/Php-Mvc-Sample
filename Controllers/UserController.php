<?php

declare(strict_types=1);
class UserController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->loadModel('User');
        $this->user = new User();
    }
    public function index()
    {
        $check_login = Auth::isLoggedIn();
        
        if ($check_login === false) {
            return $this->redirectLogin();
        }
        $users = $this->user->getAll(
            User::TABLE_NAME,
            [
                'id',
                'name',
                'email'
            ],
            [
                'column' => 'id',
                'type' => 'desc'
            ]
        );
        return $this->view('frontend.user.index', ['users' => $users]);
    }

    public function show()
    {
        $user = $this->user->getById(1);
        return $this->view('frontend.user.show', ['user' => $user]);
    }
}
