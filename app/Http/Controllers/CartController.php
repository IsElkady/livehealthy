<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $CartCollection=\Cart::getContent();
        return view('master.master-cart',compact('CartCollection'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $cartContent=\Cart::get(request()->id);

        if($cartContent!=null)
        {
            return json_encode(false);

        }
        \Cart::add(["id"=>request()->id,"price"=>request()->price,"name"=>request()->ProductName,"quantity"=>1,"attributes"=>array(),"associatedModel"=>Product::class]);
        $items=\Cart::getContent();
        echo \Cart::getTotalQuantity();
    }

    public function destroy()
    {
        \Cart::remove(request()->ProductId);
        $items=\Cart::getContent();
        $cartItems="";
        foreach($items as $product)
        {
                $cartItems.='<tr class="table_row">'.
                                        '<td class="column-1">'.
                                            '<div class="how-itemcart1" data-ProductId="'.$product->model->id.'">'.
                                                '<img src="images/'.$product->model->slug. '.jpg" alt="IMG">'.
                                            '</div>'.
                                        '</td>'.
                                        '<td class="column-2">'.$product->name.'</td>'.
                                        '<td class="column-3">$'.$product->price.'</td>'.
                                        '<td class="column-4">'.
                                            '<div class="wrap-num-product flex-w m-l-auto m-r-0">'.
                                                '<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">'.
                                                    '<i class="fs-16 zmdi zmdi-minus"></i>'.
                                                '</div>'.

                                                '<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">'.

                                                '<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">'.
                                                    '<i class="fs-16 zmdi zmdi-plus"></i>'.
                                                '</div>'.
                                            '</div>'.
                                        '</td>'.
                                        '<td class="column-5">$'. $product->price.'</td>'.
                                    '</tr>';
        }
        return $response=['cartItems'=>$cartItems,
        'cartQuantity'=>\Cart::getTotalQuantity()];
    }
    public function empty()
    {
        \Cart::clear();
    }
}


