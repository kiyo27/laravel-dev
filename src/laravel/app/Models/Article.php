<?php

namespace App\Models;

use App\Models\Tag;
use App\Scopes\PublishedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id',
    ];

    protected $casts = [
        'user_id' => 'integer'
    ];

    protected static function booted()
    {
        // static::addGlobalScope(new PublishedScope);
    }

    public function tags()
    {
        return $this
                ->belongsToMany(Tag::class)
                ->whereNull('deleted_at')
                ->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
