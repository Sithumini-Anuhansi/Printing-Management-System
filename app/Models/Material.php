<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $primaryKey = 'MaterialID';
    protected $table = 'material';

    protected $fillable = [
        'MaterialName',
        'Price',
        'Description',
        'AvailableQuantity',
    ];

    public $timestamps = false;
}
