<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'service_id',
        'rating',
        'title',
        'content',
        'is_approved',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
    ];

    /**
     * Relacionamento com usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com produto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relacionamento com serviço
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Retorna as estrelas formatadas
     */
    public function getStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

    /**
     * Scope para avaliações aprovadas
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}