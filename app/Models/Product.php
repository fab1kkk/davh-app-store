<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Model Attributes
     * "id",
     * "name",
     * "description",
     * "image",
     * "price",
     * "product_categories_id",
     * "created_at",
     * "updated_at",
     * "slug",
     */ 

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'slug'
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
    
    function getPrice()
    {
        return $this->attributes['price'];
    }
}
