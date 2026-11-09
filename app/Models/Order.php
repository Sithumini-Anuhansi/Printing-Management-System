<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'OrderID';
    protected $table = 'order';

    protected $fillable = [
        'OrderType',
        'OrderDate',
        'Products',
        'ProductQuantity',
        'Description',
        'OrderDueDate',
        'CustomerID',
    ];

    public $timestamps = false;

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }
}
