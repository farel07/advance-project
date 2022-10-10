<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $collection = 'todo';
    protected $guarded = ['id'];
}
