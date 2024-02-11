<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
            'name',
            'details',
            'price',
            'quantity',
            'published_at',
            'user_id'
        ];

    
    // Created a scope for the published list 
    public function scopePublished($query){
        return $query->whereNotNull("published_at");
    }

    // Price convert Taka to Dollar
    public function priceInDollar(){
        return (float) number_format($this->price / 100,2);
    }
}
