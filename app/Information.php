<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'informations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'thumb', 'link',
        'start_date', 'end_date', 'organization',
        'start_time', 'end_time', 'category_id',
    ];

    /**
     * Get category of infomation.
     *
     * @return Collection
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
