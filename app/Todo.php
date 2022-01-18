<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $attributes = [
        'completed' => false    // set default value for the column completed
    ];
}
