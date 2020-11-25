<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapOrders extends Model
{
    use HasFactory;

    protected $table = 'map_orders';

    protected $fillable = [
        'produc_id',
        'order_id',
        'quantity',
        'price'
    ];


    public function getProduct()
    {
        return $this->hasOne('App\Models\Products', 'id', 'produc_id');
    }
}
