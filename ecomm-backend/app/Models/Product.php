<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'file_path',
        'description',
        'price',
    ];

    // Disable the model timestamps
    public $timestamps = false;
}
