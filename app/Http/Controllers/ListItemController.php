<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MapOrders;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $quantity;

    public function index()
    {
        $dataProduct = Products::all();
        return view('items.list-item', ['data' => $dataProduct]);
    }

    public function paypal()
    {
        return view('cart.payInfo');
    }

    public function savePaypal(Request $request)
    {
        $idCustomer = $this->getCustomerInfo($request->all());
        $idOrder = $this->getOrderInfo($request->all(), $idCustomer);
        $data = $this->getIdProductQuantity();
        // dump($data);die;
        $map_orders = $this->mapOderProduct(
            $data['itemId'],
            $data['itemQuantity'],
            $idOrder,
            $data['price']
        );
        // dump($map_orders);die;
        return response()->json('thanh toan thanh cong');
    }
    public function getIdProductQuantity()
    {
        $Session = Session('cart');
        $itemId = $itemQuantity = [];
        foreach ($Session->products as $item) {
            $itemId[] = $item['productInfo']->id;
            $itemQuantity[] = $item['quantity'];
            $price[] = $item['productInfo']->price;
        };
        return [
            'itemId' => $itemId,
            'itemQuantity' => $itemQuantity,
            'price' =>  $price,
        ];
    }
    public function mapOderProduct($itemId, $itemQuantity, $idOrder, $price)
    {
        foreach ($price as $key => $pice) {
            $map_orders = MapOrders::create([
                'produc_id' => $itemId[$key],
                'order_id' => $idOrder,
                'quantity' => $itemQuantity[$key],
                'price' => $pice,
            ]);
        }
        return  $map_orders;
    }
    public function getOrderInfo($request, $idCustomer)
    {
        $addr = $request['addr_1'];
        $order = Orders::create([
            'customer_id' => $idCustomer,
            'shiping_addres' => $addr,
        ]);
        return $order['id'];
    }
    public function getCustomerInfo($request)
    {
        return $this->checkCustomerCurrent($request) == false ? $this->pushCustomerOnDb($request) : $this->checkCustomerCurrent($request);
    }

    public function checkCustomerCurrent($request)
    {
        $email = $request['email'];
        $checkCustomerEmail = Customer::where('email', $email)->first();
        if ($checkCustomerEmail === null) {
            return false;
        } else {
            return $checkCustomerEmail['id'];
        }
    }
    public function pushCustomerOnDb($request)
    {
        $name = $request['name'];
        $phone = $request['phone'];
        $email = $request['email'];
        $customer = Customer::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
        ]);

        return $customer['id'];
    }
}
