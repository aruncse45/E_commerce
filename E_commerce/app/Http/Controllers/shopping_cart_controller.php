<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productinfo;
use Cart;

class shopping_cart_controller extends Controller
{
    public function show_product(){

    	$products = productinfo::all();

    	return view('admin.cart.showproduct',['product'=>$products]);
    } 

    public function addintocart(Request $request){
    	//dd($request->all());
    	$productid = $request->productid;

    	$productbyid = productinfo::where('id',$productid)->first();
    	Cart::add([
    		'id' => $productid,
    		'name' => $productbyid->product_name,
    		'price' => $productbyid->product_price,
    		'qty' => $request->qty
     	]);
     	return redirect('/cart_show');
    }
    public function showcartproduct(){
    	$cartproducts = Cart::Content();
    	//dd($cartproducts);
    	return view('admin.cart.showcartproducts',['cartproduct'=> $cartproducts ]) ;
    }

    public function updatecart(Request $request){
    	//dd($request->all());
    	Cart::update($request->rowId, $request->qty);
    	return redirect('/cart_show')->with('msg','updated');
    }
    public function removeproduct($rowid){
    	Cart::remove($rowid);
    	return redirect('/cart_show')->with('msg','removed');
    }
}
