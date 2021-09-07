<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
