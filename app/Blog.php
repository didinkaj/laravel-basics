<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category', 'body','author','published',
    ];


}
