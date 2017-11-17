<?php

namespace Modules\Health\Entities;

use Modules\Tag\Traits\TaggableTrait;
use Modules\User\Entities\Sentinel\User;

class Post extends BaseModel
{
    use \Dimsav\Translatable\Translatable,
        TaggableTrait;
    public $translatedAttributes = ['title', 'content', 'abstract', 'slug'];
    protected $table = 'health__posts';
    protected $fillable = [
        'author_id',
        'is_public',
    ];
    protected $casts = [
        'is_public' => 'boolean'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getAuthorNameAttribute()
    {
        return $this->author->name;
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', '=', true);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'health__posts_categories');
    }

    public function scopePublished($query)
    {
        return $query->were('published_at', '>', date('now'));
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '' || $keyword !== null) {
            $query->where(function ($query) use ($keyword) {
                $query->orWhereTranslationLike('title', sprintf('%%%s%%', $keyword))
                    ->orWhereTranslationLike('abstract', sprintf('%%%s%%', $keyword))
                    ->orWhereTranslationLike('content', sprintf('%%%s%%', $keyword));
            });
        }
        return $query;
    }

    public function scopeSearchByTag($query, $tag)
    {
        if ($tag != '' || $tag !== null) {
            $query->where(function ($query) use ($tag) {
                $query->withAnyTags([$tag]);
            });
        }
        return $query;
    }

    public function scopeSearchByCategory($query, $category)
    {
        if ($category != '' || $category !== null) {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereTranslation('slug', $category);
            });
        }
        return $query;
    }
}