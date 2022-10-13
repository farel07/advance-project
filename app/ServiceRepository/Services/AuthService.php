<?php

namespace App\ServiceRepository\Services;

use App\ServiceRepository\Repositories\AuthRepository;
use App\ServiceRepository\Repositories\TodoRepository;

Class AuthService {

    public function __construct()
    {
        $this->auth_repository = new AuthRepository();
    }
    
    public function add_user($data){
        $data['password'] = bcrypt($data['password']);
        return $this->auth_repository->create_user($data);
    }
}