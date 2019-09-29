<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'deletable',
    ];

    /**
     * Get informations of category.
     *
     * @return Collection
     */
    public function informations()
    {
        return $this->hasMany(Information::class)->orderBy('created_at', 'desc');
    }
}
