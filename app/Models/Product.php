<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'price', 'category_id'];

    protected $hidden = ['id'];

    public function categories() {
        $this->belongsTo(Category::class);
    }
}
