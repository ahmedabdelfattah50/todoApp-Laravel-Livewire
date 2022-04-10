<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // ###### The attributes that are mass assignable. ######
    protected $fillable = ['title', 'description', 'user_id'];

    protected $attributes = [
        'completed' => false    // set default value for the column completed
    ];
}
