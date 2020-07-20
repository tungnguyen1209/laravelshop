<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Slide;
use App\Product;
use App\Bills;
use App\Bill_Detail;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\ProductType;

class PageController extends Controller
{
    public function GetIndex(Request $request){
        $slide = Slide::all();
        $new_product = Product::orderBy('id', 'desc')->paginate(12);
        $count = Product::all()->count();
        //dd($count);
        return view('page.index', compact('slide', 'new_product', 'count'));
    }
    public function ProductType(Request $request){
        $cat = ProductType::where('id', $request->id)->first();
        $product = Product::where('id_type', $request->id)->paginate(6);
        $count = Product::where('id_type', $request->id)->count();
        return view('page.product_type', compact('product', 'count', 'cat'));
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
    public function getcheckout(){
        return view('page.checkout');
    }
    public function postcheckout(Request $request){
        //dd($request->all());
        $bill = new Bills();
        $bill_detail = new Bill_Detail();
        if(Session::has('Cart') != null){
            //dd(Session('Cart'));
            if(Auth::guard('web')->check()){
                $bill->id_customer = Auth::guard('web')->user()->id;
            }
            else{
                $bill->id_customer = null;
            }
            $cart = Session('Cart');
            $bill->total = $cart->totalPrice;
            $bill->date_order = date('Y-m-d');
            $bill->Address = $request->address;
            $bill->Phone = $request->phone;
            $bill->Name = $request->fullname;
            $bill->Email = $request->email;
            $bill->payment = $request->payment_method;
            $bill->status = 0;
            $bill->note = $request->notes;
            $bill->save();
            foreach ($cart->items as $ct){
                $bill_detail = new Bill_Detail();
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $ct['item']->id;
                $product = Product::find($ct['item']->id);
                $product->quantity -= $ct['qty'];
                $bill_detail->quantity = $ct['qty'];
                $bill_detail->unit_price = $ct['item']->unit_price;
                $bill_detail->created_at = date("F d, Y h:i:s", time());
                $bill_detail->name = $ct['item']->name;
                $bill_detail->image = $ct['item']->image;
                $bill_detail->save();
                $product->save();
            }
        }
        $request->session()->forget('Cart');
        return view('page.checkout');
    }

    public function getlogin_customer()
    {
        if(Auth::check()){
            return redirect('/');
        }else{
        return view('page.login');
        }
    }
    public function postlogin(Request $request){
        $credentials = array('email'=>$request->email, 'password'=>$request->pass);
        if(Auth::guard('web')->attempt($credentials)){
            //dd(Auth::guard('web')->user()->id);
            return redirect('index');
        }
        else {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Email or password does not match']);
        }
    }
    public function getsignup(){
        return view('page.signup');
    }
    public function postsignup(Request $request){
        //dd($request->all());
        $customer = new User();
        $check_mail = User::where('email', $request->email)->first();
//        dd($check_mail);
        if($request->pass == $request->re_pass){
            if($check_mail == null){
            $customer->full_name = $request->fullname;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->password = Hash::make($request->pass);
            $customer->avatar = 'avatar.jpg';
            $customer->user_group = 1;
            $customer->order_count = 0;
            $customer->save();
            return redirect('/');
            }
            else{
                return view('page.signup')->with('message', 'Email Already Exist!');
            }
        }
        else{
            return view('page.signup')->with('message', 'Password confirmation does not match!');
        }
    }
    public function signout(){
        Auth::guard('web')->logout();
        return redirect('index');
    }
    public function about(){
        return view('page.about');
    }
    public function contact(){
        return view('page.contact');
    }
    public function searchbyname(Request $request){
        $slide = Slide::all();
          //dd($request->search);
        $search = $request->search;
        $product = Product::where(function ($query) use ($search){
            $query->where('name', 'like', '%'.$search.'%');
        })->paginate(8);
        $product->appends(['search' => $search]);
        $count = Product::where('name', 'like', '%' . $request->search . '%')->get()->count();
        return view('page.product_search', compact('product', 'slide', 'count'));
    }
    public function searchbyproductname(Request $request){
        $product = Product::where('name', 'like', '%' . $request->search . '%')->get();
        return response()->json($product);
    }
}
