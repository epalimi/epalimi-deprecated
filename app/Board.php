<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Get articles of category.
     *
     * @return Collection
     */
    public function articles()
    {
        return $this->hasMany(Article::class)->orderBy('created_at', 'desc');
    }
}
