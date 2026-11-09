<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductID';

    protected $table = 'product';

    protected $fillable = [
        'ProductType',
        'Price',
        'Size',
        'Description',
    ];

    public $timestamps = false;
}
