<?php

namespace Modules\Health\Entities;

class Category extends BaseModel
{
    use \Dimsav\Translatable\Translatable,
        \Modules\Media\Support\Traits\MediaRelation;

    public $translatedAttributes = ['title', 'content', 'abstract', 'slug'];

    protected $table = 'health__categories';

    protected $fillable = [
        'is_published',
    ];
    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', '=', true);
    }

    public function getFeaturedImageAttribute(){
        return $this->filesByZone('featured_image')->first();
    }
}