<?php

namespace Core\App\Models;

use Illuminate\Database\Eloquent\Model;

class Core extends Model
{


    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'cores';

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
