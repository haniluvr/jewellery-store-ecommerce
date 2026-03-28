<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class CmsPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'type',
        'category',
        'is_active',
        'is_featured',
        'featured_image',
        'published_at',
        'sort_order',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'sort_order' => 'integer',
    ];

    // Boot method to auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }

            // Set published_at if active and currently empty
            if ($page->is_active && empty($page->published_at)) {
                $page->published_at = now();
            }
        });

        static::updating(function ($page) {
            if ($page->isDirty('title') && empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }

            // Set published_at if being activated and empty
            if ($page->is_active && $page->isDirty('is_active') && empty($page->published_at)) {
                $page->published_at = now();
            }
        });
    }

    // Relationships
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopePublished($query)
    {
        return $query->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    // Accessors
    public function getFeaturedImageUrlAttribute(): ?string
    {
        if ($this->featured_image) {
            return asset('storage/'.$this->featured_image);
        }

        return null;
    }

    public function getExcerptAttribute(): string
    {
        if ($this->attributes['excerpt'] ?? null) {
            return $this->attributes['excerpt'];
        }

        return Str::limit(strip_tags($this->content), 150);
    }

    public function getStatusColorAttribute(): string
    {
        if ($this->is_active && $this->published_at && $this->published_at <= now()) {
            return 'text-green-600 bg-green-100';
        } elseif ($this->is_active) {
            return 'text-yellow-600 bg-yellow-100';
        } else {
            return 'text-gray-600 bg-gray-100';
        }
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('M d, Y');
    }

    // Methods
    public function isPublished(): bool
    {
        return $this->is_active && $this->published_at && $this->published_at <= now();
    }

    public function isDraft(): bool
    {
        return $this->is_active && (! $this->published_at || $this->published_at > now());
    }

    public function isInactive(): bool
    {
        return ! $this->is_active;
    }

    public function publish(): bool
    {
        return $this->update([
            'is_active' => true,
            'published_at' => $this->published_at ?: now(),
        ]);
    }

    public function unpublish(): bool
    {
        return $this->update(['is_active' => false]);
    }

    // Static methods
    public static function getTypeOptions(): array
    {
        return [
            'page' => 'Static Page',
            'press_release' => 'Press Release',
            'exhibition' => 'Exhibition',
            'insight' => 'Insight/Article',
            'blog' => 'Blog Post',
            'news' => 'News Update',
            'faq' => 'FAQ',
            'policy' => 'Policy',
            'update' => 'System Update',
        ];
    }

    public static function findBySlug(string $slug): ?self
    {
        return self::where('slug', $slug)->first();
    }
}
