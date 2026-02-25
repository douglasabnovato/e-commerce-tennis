<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via ::create()
    protected $fillable = [
        'name',
        'brand',
        'category',
        'price',
        'discount_price',
        'stock',
        'material',
        'weight',
        'technology',
        'usage_type',
        'release_year',
        'sku',
        'image',
        'description',
        'history',
        'nba_minutes_played',
    ];

    // Relacionamentos
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
