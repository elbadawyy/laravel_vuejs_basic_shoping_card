<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Helpers\Util;
use Auth;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $product=new Product();
        return view('products_list', ['all_products'=>$product::all()]);
    }

    public function getAllproducts()
    {
        $product=new Product();
        $all_products=$product::all();
        $all_products_array=json_decode(json_encode($all_products), true);
        // var_dump($all_products_array);
        $all_products_array_maped=array_map(function ($product) {
            return [
                'product_id'=>$product['id'],
                'product_name'=>$product['product_name'],
                'product_img'=>$product['product_img'],
                'product_price'=>$product['product_price'],
            ];
        }, $all_products_array);
        return $all_products_array_maped;
    }

    public function addToMyCart(Request $request)
    {
        $product_id=$request->input('product_id');
        $product_quantity=(int) $request->input('product_quantity');
        $session_key_name=(Auth::check()) ? 'logged_in_user_cart_items' : 'not_logged_in_user_cart_items';
        $cart_items=(session($session_key_name))? session($session_key_name) : [];
        $found_item_index = Util::getIndexOfArrayMemeber($cart_items, 'product_id', $product_id);

        if (is_int($found_item_index)) {
            $cart_items[$found_item_index]['product_quantity']+=$product_quantity;
        } else {
            array_push($cart_items, [
                'product_id'=>$product_id,
                'product_quantity'=>$product_quantity
            ]);
        }
        session([ $session_key_name=> $cart_items]);
        var_dump($cart_items);
    }
}
