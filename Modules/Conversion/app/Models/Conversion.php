<?php

namespace Conversion\App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{


    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'conversions';

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
