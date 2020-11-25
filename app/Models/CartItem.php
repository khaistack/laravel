<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartItem extends Model
{
    use HasFactory;

    // public function getIdProduct($itemCart)
    // {
    //     foreach ($itemCart->products as $value) {
    //         $id[] = $value['productInfo']->id;
    //     }
    //     return $id;
    // }
    // public function getCartItem($idCart, $idProduct, $itemCart)
    // {
    //     $quantity = $this->getQuantity($itemCart);

    //     $cartItem = DB::table('cart_item')->insert([
    //         'cart_id' => $idCart,
    //         'product_id' => $idProduct,
    //         'quantity' => $quantity
    //     ]);
    //     dump($cartItem);die;
    //     return view('cart.payInfo');
    // }
    // public function getQuantity($itemCart)
    // {
    //     foreach ($itemCart->products as $value) {
    //         $q[] =  $value['quantity'];
    //     }
    //     return $q;
    // }
    // public function saveCart($itemCart)
    // {
    //     $item = $itemCart->products;
    //     foreach ($item as $value) {
    //         $idCart[] = DB::table('carts')->insertGetId(
    //             ['name' => $value['productInfo']->name]
    //         );
    //     }
    //     return $idCart;
    // }
}
