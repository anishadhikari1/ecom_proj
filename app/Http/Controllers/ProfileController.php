<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile.index');
    
    }

    public function orders() {
        $user_id = Auth::user()->id;
        // $orders=Orders_products::all();
        $orders = DB::table('orders_product')->leftJoin('products', 'products.id', '=', 'orders_product.product_id')->leftJoin('orders', 'orders.id', '=', 'orders_product.orders_id')->where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }
    
    public function address(){
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->get();
        return view('profile.address', compact('address_data'));
     
    }

    public function updateAddress(Request $request) {
        $this->validate($request, [
        'fullname' => 'required|min:5|max:35',
        'pincode' => 'required|numeric',
        'city' => 'required|min:5|max:25',
        'state' => 'required|min:5|max:25',
        'country' => 'required']);

        $userid = Auth::user()->id;
        DB::table('address')->where('user_id', $userid)->update($request->except('_token'));

        return back()->with('msg','Your address has been updated');
    }
    

}
