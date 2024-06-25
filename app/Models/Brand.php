<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function hasProductWithCategory($category_id)
    {
        foreach ($this->products as $product) {
            if ($product->category_id == $category_id) {
                return true;
            }
        }
        return false;
    }
}
