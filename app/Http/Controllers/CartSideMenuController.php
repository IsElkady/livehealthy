<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartSideMenuController extends Controller
{
    public function PostElements()              //function that return  subtotal and total with layout.
    {

        $cartItems=
            '</ul>' .
                '<hr>'.
                '<div class="w-full">' .
                    '<div class="header-cart-total w-full p-tb-40">' .
                    '<hr>'.
                    'Subtotal: $'.\Cart::getSubTotal() .
                    '<br/>'.
                    '<strong>'.
                        'Total: $'.\Cart::getTotal() .
                    '</strong>'.
                '</div>' .
                '<div class="header-cart-buttons flex-w w-full">' .
                    '<a href="/cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">' .
                        'View Cart'.
                    '</a>' .
                    '<a href="/cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">' .
                        'Check Out' .
                    '</a>' .
                '</div>' .
            '</div>' .
            '<div class="ps__rail-x" style="left: 0px; bottom: 0px;">' .
                '<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">' .
                '</div>' .
            '</div>' .
            '<div class="ps__rail-y" style="top: 0px; right: 0px;">' .
                '<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">' .
                '</div>' .
            '</div>' .
        '</div>' ;
        return $cartItems;
    }

    public function PreElements()
    {
        $cartItems='<div class="header-cart-content flex-w js-pscroll ps" style="position: relative; overflow: hidden;">'.
            '<ul class="header-cart-wrapitem w-full">';
        return $cartItems;
    }





    public function index()
    {
        $items=\Cart::getContent();                 //return cart contents
        $condition = new \Darryldecode\Cart\CartCondition(array(            //initialize tax
            'name' => 'VAT 14%',
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '14%'
        ));
        \Cart::condition($condition);
        $cartItems='';                              //initialize cartItems variable;
        foreach($items as $product)                 //add items to the cart
        {
            $cartItems.=
                '<li class="header-cart-item flex-w flex-t m-b-12" data-ProductId='.$product->id.'>'.
                    '<div class="header-cart-item-img">'.
                        '<img src="/images/'.$product->model->slug.'.jpg" alt="IMG">'.
                    '</div>'.
                    '<div class="header-cart-item-txt p-t-8">'.
                        '<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">'.
                            $product->name.
                        '</a>'.

                        '<span class="header-cart-item-info">1 x $'.
								$product->price.
							'</span>'.
                    '</div>'.
                '</li>';
        }
        if(\Cart::isEmpty())                    //if empty return No items in the cart message
        {
            $cartItems.=
                '<div class="header-cart-content flex-w js-pscroll ps" style="position: relative; overflow: hidden;">'.
                '<ul class="header-cart-wrapitem w-full">'.
                    '<li class="header-cart-item">No items in the cart</li>'.
                '</ul>' .
                    '<div class="w-full">' .
                        '<div class="header-cart-buttons flex-w w-full">' .
                        '</div>' .
                    '</div>' .
                    '<div class="ps__rail-x" style="left: 0px; bottom: 0px;">' .
                        '<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">' .
                        '</div>' .
                    '</div>' .
                    '<div class="ps__rail-y" style="top: 0px; right: 0px;">' .
                        '<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">' .
                        '</div>' .
                    '</div>'.
                '</div>';
        }
        else                                    //if items has data return concatenate $cartItems and PostElements function
        {
            $cartItems=$this->PreElements() . $cartItems . $this->PostElements();
        }
        echo $cartItems;

    }



    public function destroy(){                          //remove items from the cart
        \Cart::remove(request()->ProductId);
        $items=\Cart::getContent();
        $cartItems="";
        foreach($items as $product) {           //reconstruct sideMenu with items
            $cartItems .=
                '<li class="header-cart-item flex-w flex-t m-b-12" data-ProductId='.$product->id.'>'.
                    '<div class="header-cart-item-img">'.
                        '<img src="/images/'.$product->model->slug.'.jpg" alt="IMG">'.
                    '</div>'.

                    '<div class="header-cart-item-txt p-t-8">'.
                        '<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">'.
                            $product->name.
                        '</a>'.

                        '<span class="header-cart-item-info">'.
								'1 x $'.$product->price.
							'</span>'.
                    '</div>'.
                '</li>';
        }
        if(\Cart::isEmpty())                    //if empty return No items in the cart message
        {
            $cartItems=
                    '<div class="header-cart-content flex-w js-pscroll ps" style="position: relative; overflow: hidden;">'.
                        '<ul class="header-cart-wrapitem w-full">'.
                            '<li class="header-cart-item">No items in the cart</li>'.
                        '</ul>' .
                        '<div class="w-full">' .
                            '<div class="header-cart-buttons flex-w w-full">' .
                            '</div>' .
                        '</div>' .
                        '<div class="ps__rail-x" style="left: 0px; bottom: 0px;">' .
                            '<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">' .
                            '</div>' .
                        '</div>' .
                        '<div class="ps__rail-y" style="top: 0px; right: 0px;">' .
                            '<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">' .
                            '</div>' .
                        '</div>'.
                    '</div>';
        }
        else{

             $cartItems=$this->PreElements() . $cartItems . $this->PostElements();
        }
         $response=['cartItems'=>$cartItems,                        //return cartItems details
                    'cartQuantity'=>\Cart::getTotalQuantity()];     //return cartQunatity to update data-notify attribute
        return $response;

    }
}
