<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Slide;
use App\Product;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use Session;

class PageController extends Controller
{
    public function GetIndex(Request $request){
        $slide = Slide::all();
        $new_product = Product::orderBy('id', 'desc')->paginate(12);
        return view('page.index', compact('slide', 'new_product'));
    }
    public function ProductType(){
        return view('page.product_type');
    }
    public function ProductDetails(Request $request){
        $product = Product::where('id', $request->id)->first();
        return view('page.product_details', compact('product'));
    }
    public function AddCart(Request $request, $id){
        $product = Product::where('id', $id)->first();
        if($product != null){
            $oldcart = Session('Cart') ? Session('Cart'):null;
            $newcart = new Cart($oldcart);
            $newcart->add($product, $id);
            $request->session()->put('Cart', $newcart);
        }
        return view('page.cart', compact('newcart'));
    }
    public function DelCart(Request $request, $id){
        $oldcart = Session('Cart') ? Session('Cart'):null;
        $newcart = new Cart($oldcart);
        $newcart->removeItem($id);
        if(Count($newcart->items) > 0)
        {
        $request->session()->put('Cart', $newcart);
        }
        else{
            $request->session()->forget('Cart');
        }
        return view('page.cart', compact('newcart'));
    }
    public function ListCart(){
        return view('page.list_cart');
    }
    public function DelListCart(Request $request, $id){
        $oldcart = Session('Cart') ? Session('Cart'):null;
        $newcart = new Cart($oldcart);
        $newcart->removeItem($id);
        if(Count($newcart->items) > 0)
        {
            $request->session()->put('Cart', $newcart);
        }
        else{
            $request->session()->forget('Cart');
        }
        return view('page.cart-detail', compact('newcart'));
    }
    public function UpdateListCart(Request $request, $id, $qty){
        $oldcart = Session('Cart') ? Session('Cart'):null;
        $newcart = new Cart($oldcart);
        $newcart->updateItem($id, $qty);
        $request->session()->put('Cart', $newcart);
        return view('page.cart-detail', compact('newcart'));
    }
    public function UpdateAllCart(Request $request){
        //dd($request->data);
        $data = $request->data;
        foreach ($data as $items) {
            $oldcart = Session('Cart') ? Session('Cart'):null;
            $newcart = new Cart($oldcart);
            $newcart->updateItem($items['key'], $items['value']);
            $request->session()->put('Cart', $newcart);
        }

        return view('page.cart-detail', compact('newcart'));
    }
}
