<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Optional: specify the table if it's not 'products'
    // protected $table = 'products';

    // Optional: specify the fillable fields
    protected $fillable = ['name', 'price'];
}
