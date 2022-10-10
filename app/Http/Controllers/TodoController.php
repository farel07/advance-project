<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRepository\Services\TodoService;
use GuzzleHttp\Promise\Create;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->TodoService = new TodoService();
    }

    public function index(){
        return $this->TodoService->get_all_todo();
    }

    public function create_todo(Request $request){

        $validatedData = $request->validate([
            'todo' => 'required',
            'waktu' => 'required'
        ]);

        return $this->TodoService->add_todo($validatedData);
    }

    public function update_todo(Request $request){

        $validatedData = $request->validate([
            'todo' => 'required',
            'waktu' => 'required'
        ]);

        $id = $request->id;

        return $this->TodoService->update_todo($validatedData, $id);
    }

    public function delete_todo(Request $request){
        $id = $request->validate(['id' => 'required']);
        
        return ['msg' => $this->TodoService->delete_todo($id)];
    }
}
