<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name_product',
        'desc_product',
        'price_product',
        'qty_stok',
        'size_clothes',
        'color_clothes'
    ];
}
