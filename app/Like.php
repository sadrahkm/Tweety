<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    /*
        The error "TypeError: Too few arguments to function Illuminate/Database/Eloquent/Model::setAttribute()"
        was for removing created_at and updated_at columns in database table
        and also setting these 2 options to false in Like Model :|
    */
}
