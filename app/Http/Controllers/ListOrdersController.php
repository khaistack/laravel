<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MapOrders;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListOrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Orders::get();
        $totalPrice = Orders::getTotalPriceOfOrder($data);
        $today = Carbon::now()->day;
        return view(
            'admin.products.list-orders',
            [
                'data' =>  $data,
                'totalPriceOfOrder' => $totalPrice,
                'today' => $today,
            ]
        );
    }
    public function show(Request $request, $param)
    {
        switch ($param) {
            case 'Today':
                $data =  $this->getOrderToday();
                return view('admin.products.list-orders', ['data' =>  $data]);
                break;

            default:
                $data =  $this->getOrderMonth();
                return view('admin.products.list-orders', ['data' =>  $data]);
                break;
        }
    }
}
