<?php

namespace App\ServiceRepository\Services;

use App\ServiceRepository\Repositories\TodoRepository;

Class TodoService {

    public function __construct()
    {
        $this->TodoRepository = new TodoRepository();
    }

    public function get_all_todo(){
        return $this->TodoRepository->get_all();
    }

    public function add_todo($data){
        $data['user'] = [
            'id' => auth()->user()->_id,
            'name' => auth()->user()->name
        ];
        return $this->TodoRepository->create($data);
    }

    public function update_todo($data, $id){

        $todo = $this->getById($id);

        if(auth()->user()->_id != $todo->user->id ){
            return abort(403, 'gaada akses');
        }

        if($data['todo']){
            $editData['todo'] = $data['todo'];
        }
        if($data['waktu']){
            $editData['waktu'] = $data['waktu'];
        }

        if($this->TodoRepository->update($editData, $id) < 1){
            return 'gagal update';
        } else {    
            return $this->TodoRepository->getById($id);
        }
    }

    public function delete_todo($id){

        if(!$this->getById($id['id'])){
            return 'todo id ' . $id['id'] . ' tidak ditemukan';
        }
        $this->TodoRepository->delete($id);
        return $id['id'] . ' berhasil dihapus';
    }

    public function getById($id){
        return $this->TodoRepository->getById($id);
    }
}
