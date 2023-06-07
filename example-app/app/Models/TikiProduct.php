<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TikiProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'unit_price',
        'promo_price',
        'des',
        'rate',
        'sold'
    ];
    protected $table = "products";
}
