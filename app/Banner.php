<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'footer',
        'link', 'background', 'order',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
