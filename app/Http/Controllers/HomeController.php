<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\wishlist;
use App\Models\recommends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function shop(){
        $products = Product::all();
        $categories = Category::all();

        return view('front.shop',compact(['categories','products']));
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('front.home');
    }


public function wishlist(Request $request){
    $wishlist = new wishlist;
    $wishlist->user_id = Auth::user()->id;
    $wishlist->pro_id = $request->pro_id;

    $wishlist->save();

    $Products = DB::table('products')->where('id',$request->pro_id)->get();
    return view('front.product_details',compact('Products'));
}

public function view_wishList(){
    $Products = DB::table('wishlist')->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->get();
    return view('front.wishList',compact('Products'));
}


public function removeWishList($id){
    DB::table('wishlist')->where('pro_id','=',$id)->delete();
    return back()->with('msg','Item Removed from WishList');
}


    public function contact(){
        return view('front.contact');
    }


    public function product_details($id)
    {

        if(Auth::check())
        {
            $recommends = new recommends;
            $recommends->uid = Auth::user()->id;
            $recommends->pro_id = $id;
            $recommends->save();
        }
        // $products = Product::findOrFail($id);
        // return view('front.product_details',compact('products'));

    $Products = DB::table('products')->where('id',$id)->get();
    return view('front.product_details',compact('Products'));
     
}
   
public function SelectSize(Request $request)
{
    $proDum =  $request->proDum;
    $size = $request->size;

    $s_price = DB::table('products_properties')->where('pro_id',$proDum)->where('size',$size)->get();
    foreach($s_price as $sPrice)
    {
        echo $sPrice->p_price;
   }
}

public function newArrival(){
    $products = DB::table('products')->where('new_arrival',1)->paginate(6);
    return view('front.newArrival',compact('products'));
}

public function addReview(Request $request){
    DB::table('reviews')->insert(['person_name'=>$request->person_name,
    'person_email'=>$request->person_email,'review_content'=>$request->review_content,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);

    return back();
}


public function search(Request $request)
{

     $search = $request->input('site_search');

     if ($search == '') {
        return view('front.shop');
    } else { 
    $products = DB::table('products')->where('pro_name', 'like', '%{$search}%')->paginate(2);
    return view('front.shop', ['msg' => 'Results: '. $search ], compact('products'));
}


}
}




