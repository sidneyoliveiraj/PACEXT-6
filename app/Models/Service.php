<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'duration',
        'is_featured',
        'is_active',
        'category_id',
        'thumbnail',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Boot method para gerar slug automaticamente
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('name') && empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }

    /**
     * Relacionamento com categoria
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relacionamento com avaliações
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Relacionamento com itens de pedido
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relacionamento com itens do carrinho
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Retorna a duração formatada em horas e minutos
     */
    public function getFormattedDurationAttribute()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;

        if ($hours > 0 && $minutes > 0) {
            return "{$hours}h {$minutes}min";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$minutes}min";
        }
    }

    /**
     * Retorna a URL da thumbnail
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }

        return asset('images/placeholder-service.jpg');
    }

    /**
     * Retorna a média de avaliações
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()
            ->where('is_approved', true)
            ->avg('rating') ?? 0;
    }

    /**
     * Retorna o total de avaliações aprovadas
     */
    public function getReviewsCountAttribute()
    {
        return $this->reviews()
            ->where('is_approved', true)
            ->count();
    }

    /**
     * Scope para serviços ativos
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope para serviços em destaque
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}