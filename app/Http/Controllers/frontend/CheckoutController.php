<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
       
        $old_cartitems=Cart::where('user_id',Auth::id())->get();

        foreach($old_cartitems as $item)
        {

            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists() )
           {
            
            $removeItems=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
            $removeItems->delete();
          
           }
          
        }
       
       
       $cartitems=Cart::where('user_id',Auth::id())->get();
       return view('frontend.checkout',compact('cartitems'));
}
    public function placeorder(Request $request)
    {

        $order=new Order();
        $order->user_id=Auth::id();
        $order->fname=$request->input('fname');
        $order->phone=$request->input('phone');
        $order->address1=$request->input('address1');
        $order->address2=$request->input('address2');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->pincode=$request->input('pincode');
        $total=0;
        $cartitems_total=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total +=$prod->products->selling_price;
        }
        $order->total_price=$total;

        $order->tracking_no='mahbubur'.rand(1111,9999);
        $order->save();

        $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
           
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price
            ]);
            $prod=Product::where('id',$item->prod_id)->first();
            $prod->qty=$prod->qty - $item->prod_qty;
            $prod->update();

           
        }
        
        if(Auth::user()->fname == NULL)
        {

            $user=User::where('id',Auth::id())->first();
            $user->name=$request->input('fname');
            
            // $user->phone=$request->input('phone');
            // $user->address1=$request->input('address1');
            // $user->address2=$request->input('address2');
            // $user->city=$request->input('city');
            // $user->state=$request->input('state');
            // $user->country=$request->input('country');
            // $user->pincode=$request->input('pincode');
            $user->update();
        }

        $cartitems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status',"order places successfully");
    }
    public function razorpaycheck(Request $request)
    {

        $cartitems=Cart::where('user_id',Auth::id())->get();
        $total_price=0;
        foreach($cartitems as $item)
        {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }
       $firstname=$request->input('firstname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $address1=$request->input('address1');
        $address2=$request->input('address2');
        $city=$request->input('city');
        $state=$request->input('state');
        $country=$request->input('country');
        $pincode=$request->input('pincode');

        return response()->json([
            'firstname'=>$firstname,
                'lastname'=>$lastname,
                'email'=>$email,
                'phone'=>$phone,
                'address1'=>$address1,
                'address2'=>$address2,
                'city'=>$city,
                'state'=>$state,
                'country'=>$country,
                'pincode'=>$pincode,
                'total_price'=>$total_price
        ]);
    }
}
