<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $fillable =[
        'name_brand', 'stock', 'description'
    ];
}
