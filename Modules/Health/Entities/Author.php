<?php

namespace Modules\Health\Entities;

class Author extends BaseModel
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['names', 'slug'];
    protected $table = 'health__authors';
    protected $fillable = [
        'is_public',
    ];
    protected $casts = [
        'is_public' => 'boolean'
    ];

    public function scopePublic($query)
    {
        return $query->where('is_public', '=', true);
    }
}