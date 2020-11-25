<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'name',
    ];

    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    public function addCart($product, $id)
    {
        // dump($product);die;
        $newProduct = [
            'quantity' => 0,
            'price' => $product->price,
            'productInfo' => $product
        ];

        // dump($newProduct);

        if ($this->products) {
            // dd('aa');die;
            if (array_key_exists($id, $this->products)) {
                // dump($this->products[$id],'ss');die;
                $newProduct = $this->products[$id];
                // dump($newProduct);die;
            }
        }
        $newProduct['quantity'] = $newProduct['quantity'] + 1;
        // dump( $newProduct['quantity']);die;
        // dump( $newProduct);
        // dump($newProduct['quantity']);die;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        // dump( $newProduct['price'] );die;
        $this->products[$id] = $newProduct;
        $this->totalPrice =  $product->price + $this->totalPrice;
        $this->totalQuantity++;
    }

    public function deleteItem($id)
    {
        // dump($id);die;
        $this->totalQuantity =  $this->totalQuantity - $this->products[$id]['quantity'];
        $this->totalPrice = $this->totalPrice - $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
