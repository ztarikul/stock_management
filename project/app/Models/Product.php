<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
