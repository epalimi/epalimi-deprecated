<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'thumb',
        'is_external', 'external_link', 'board_id',
    ];

    /**
     * Get board of infomation.
     *
     * @return Collection
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
