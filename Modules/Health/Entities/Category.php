<?php

namespace Modules\Health\Entities;

class Category extends BaseModel
{
    use \Dimsav\Translatable\Translatable,
        \Modules\Media\Support\Traits\MediaRelation;

    public $translatedAttributes = ['title', 'content', 'abstract', 'slug'];

    protected $table = 'health__categories';

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

    public function getFeaturedImageAttribute(){
        return $this->filesByZone('featured_image')->first();
    }
}