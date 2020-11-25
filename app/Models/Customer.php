<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'customer_id'
    ];

    static  public function getCustomerTotal()
    {
        $data = Customer::count();
        return $data;
    }

    public function getOrderCustomer()
    {
        return $this->hasMany('App\Models\Orders', 'id', 'customer_id');
    }
}
