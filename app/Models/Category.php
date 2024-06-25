<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function hasBrand($brand_id)
    {
        foreach ($this->products as $product) {
            if ($product->brand_id == $brand_id) {
                return true;
            }
        }
        return false;
    }
    public function hasGender($gender_id)
    {
        foreach ($this->products as $product) {
            if ($product->gender_id == $gender_id) {
                return true;
            }
        }
        return false;
    }
}
