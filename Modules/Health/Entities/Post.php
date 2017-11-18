<?php

namespace Modules\Health\Entities;

use Carbon\Carbon;
use Modules\Tag\Contracts\TaggableInterface;
use Modules\Tag\Traits\TaggableTrait;
use Modules\User\Entities\Sentinel\User;

class Post extends BaseModel implements TaggableInterface
{
    use \Dimsav\Translatable\Translatable,
        \Modules\Core\Traits\NamespacedEntity,
        \Modules\Tag\Traits\TaggableTrait,
        \Modules\Media\Support\Traits\MediaRelation;

    public $translatedAttributes = ['title', 'content', 'abstract', 'slug'];

    protected static $entityNamespace = 'health/post';

    protected $table = 'health__posts';
    protected $fillable = [
        'author_id',
        'is_public',
        'published_at'
    ];
    protected $casts = [
        'is_public' => 'boolean'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function getAuthorNamesAttribute()
    {
        return $this->author->names;
    }

    public function getFeaturedImageAttribute()
    {
        return $this->filesByZone('featured_image')->first();
    }

    public function getImageGalleryAttribute()
    {
        return $this->filesByZone('gallery');
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $published_at);
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