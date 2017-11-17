<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;

class AuthorTranslation extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;

    protected $table = 'health__authors_translations';
    public $timestamps = false;
    public $fillable = ['names', 'slug'];

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'names'
            ]
        ];
    }
}