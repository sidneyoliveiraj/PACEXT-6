<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Relacionamento com produto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Retorna a URL da imagem
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}