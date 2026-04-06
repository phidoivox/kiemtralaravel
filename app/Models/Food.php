<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory;

    protected $table = 't_food';

    protected $fillable = ['name', 'price', 'old_price', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
