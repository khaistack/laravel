<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        $item = Products::find($id);
        return view('cart.cart', ['data' => $item]);
    }

    public function addCart(Request $request, $id)
    {
        // dump('aaa');
        $product = Products::find($id);
        // dump($product);die;
        if ($product !== null) {
            $currentCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($currentCart);
            $newCart->addCart($product, $id);
            $request->session()->put('cart', $newCart);
        }

        return view('cart.cart-item');
    }

    public function deleteItem(Request $request, $id)
    {
        // dump($id);
        $currentCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($currentCart);
        $newCart->deleteItem($id);
        if (Count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart', $newCart);
        }
        return view('cart.cart-item');
    }

    public function deleteListItem(Request $request, $id)
    {
        $currentCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($currentCart);
        $newCart->deleteItem($id);
        if (Count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart', $newCart);
        }
        return view('cart.cart');
    }

    public function listCart()
    {
        return view('cart.cart');
    }
}
