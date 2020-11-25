<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'shiping_addres',
        'id'

    ];

    static public function getOrdersTotal()
    {
        $data = Orders::count();
        return $data;
    }

    public function getOrders()
    {
        return $this->hasMany('App\Models\MapOrders', 'order_id');
    }

    public function getCustomer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    static public function getTotalPriceOfOrder($data)
    {
        $totalPrice = [];
        foreach ($data as $vale) {
            $temp_price = 0;
            foreach ($vale->getOrders as $key => $Orders) {
                $temp_price = $temp_price + ($Orders['quantity'] * $Orders['price']);
            }
            $totalPrice[$vale->id] = $temp_price;
        }
        return $totalPrice;
    }
}
