<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'slug',
        'category_id',
        'user_id',
        'thumbnail',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param mixed $query
     * @param array<int,mixed> $filters
     */
    public function scopeFilter($query, array $filters): void
    { // Post::newQuery()->filter()

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'category',
                fn ($categoryQuery) =>
                $categoryQuery->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $authorUsername) {
            $query->whereHas(
                'author',
                fn ($authorQuery) =>
            $authorQuery->where('username', $authorUsername)
            );
        });

    }

}
