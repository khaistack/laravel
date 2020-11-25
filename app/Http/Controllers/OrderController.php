<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     return view('cart.cart');
    // }
    public function index()
    {
        return view('admin.orders.list-orders');
    }
}
