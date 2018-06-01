<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('checkout');
    }
    public function getAllCartItem()
    {
        $card_items=session('logged_in_user_cart_items');
        $products_info_array=[];
        foreach ($card_items as $item) {
            $item_info=Product::findOrFail($item['product_id']);
            array_push($products_info_array, [
                'product_name'=>$item_info->product_name,
                'product_desc'=>$item_info->product_desc,
                'product_price'=>$item_info->product_price,
                'product_quantity'=>$item['product_quantity']
            ]);
        }
        return $products_info_array;
    }
}
