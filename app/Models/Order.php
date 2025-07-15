<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'OrderID';
    protected $table = 'Order';

    protected $fillable = [
        'OrderType',
        'OrderDate',
        'Products',
        'ProductQuantity',
        'Description',
        'OrderDueDate',
        'CustomerID',
    ];

    public $timestamps = true;

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }
}
