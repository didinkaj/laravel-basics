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
        'title', 'category', 'body', 'user_id', 'published',
    ];

    public function users()
    {
        return $this->belongsTo('Blog\User');
    }

    //mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }


}
