<?php 

namespace App\ServiceRepository\Repositories;
use App\Models\User;

class AuthRepository{
    public function create_user($data){
        return User::create($data);
    }
}