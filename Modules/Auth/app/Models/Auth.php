<?php

namespace Auth\App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{


    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'auths';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
