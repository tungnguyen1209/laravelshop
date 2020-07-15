<?php

namespace Modules\Admin\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Bill_Detail;
use App\Bills;
use App\User;
use Auth;
use Session;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
        $bills = Bills::orderby('id', 'desc')->paginate(5);
        $new_cus = User::orderby('id', 'desc')->paginate(5);
        $new_pro = Product::orderby('id', 'desc')->paginate(3);
        return view('admin::index', compact('bills', 'new_cus', 'new_pro'));
        }
        else{
            return redirect()->route('login');
        }
    }
    public function create()
    {

    }
    public function getlogin(Request $request)
    {
        return view('admin::login');
    }
    public function postlogin(Request $request)
    {
        //dd($request->all());
        $credentials = array('email'=>$request->email, 'password'=>$request->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('index')->with(['flag'=>'success','message'=>'Login successfully']);
        }
        else {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Email or password does not match']);
        }
       // return view('admin::show');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
