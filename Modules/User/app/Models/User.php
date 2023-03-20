<?php

namespace User\App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;

class User extends Model
{
    use SoftDeletes;
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'users';
//    protected $primaryKey = 'id';
//    protected $collection = 'my_books_collection';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username' , 'email' , 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
