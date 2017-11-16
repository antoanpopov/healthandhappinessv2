<?php
namespace Modules\Health\Entities;

use Modules\Tag\Traits\TaggableTrait;
use Modules\User\Entities\Sentinel\User;

class Post extends BaseModel
{
    use \Dimsav\Translatable\Translatable,
        TaggableTrait;
    public $translatedAttributes = ['title','content','abstract','slug'];
    protected $table = 'health__posts';
    protected $fillable = [
        'author_id',
        'is_published',
    ];
    protected $casts = [
        'is_published' => 'boolean'
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function scopePublished($query)
    {
        return $query->where('is_published', '=', true);
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'health__posts_categories');
    }
    public function scopeSearchByKeyword($query, $keyword){
        if($keyword != '' || $keyword !== null){
            $query->where(function ($query) use ($keyword){
                $query->orWhereTranslationLike('title',sprintf('%%%s%%',$keyword))
                    ->orWhereTranslationLike('abstract',sprintf('%%%s%%',$keyword))
                    ->orWhereTranslationLike('content',sprintf('%%%s%%',$keyword));
            });
        }
        return $query;
    }
    public function scopeSearchByTag($query, $tag){
        if($tag != '' || $tag !== null){
            $query->where(function ($query) use ($tag){
                $query->withAnyTags([$tag]);
            });
        }
        return $query;
    }
    public function scopeSearchByCategory($query, $category){
        if($category != '' || $category !== null){
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereTranslation('slug', $category);
            });
        }
        return $query;
    }
}