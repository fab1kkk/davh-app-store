<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id');
    }

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'product_categories_id',
        'slug',
    ];
    public function scopeFilter($query, array $filters)
    {
        if (empty($filters['q'])) {
            return $query;
        }
        $query->when($filters['q'] ?? false, function ($query, $search) {
            $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
    }
    
    function getPrice($currency = 'pln')
    {
        return $this->attributes['price'] . ' ' .$currency;
    }
}
