<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //

    protected $table = 'registrations';

    protected $guarded = ['id'];

    protected $hidden = ['password'];
}
