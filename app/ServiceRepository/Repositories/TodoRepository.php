<?php

namespace App\ServiceRepository\Repositories;
use App\Models\Todo;


Class TodoRepository {

    public function __construct()
    {
        $this->todo = new Todo();
    }

    public function get_all(){
        return $this->todo::get();
    }

    public function create($data){
         return $this->todo::create($data);
    }

    public function update($data, $id){
        return $this->todo::where('_id', $id)->update($data);
    }

    public function getById($id){
        return $this->todo::find($id);
    }

    public function delete($id){
        return $this->todo::destroy($id);
    }
}