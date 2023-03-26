<?php

namespace Image\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'images';

    protected $fillable = ['path', 'name', 'model_id', 'model_type'];

    /**
     * Get the parent imageable model (user or post).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
