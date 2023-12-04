<?php

namespace App\Http\Controllers;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
Use App\Models\Item;
Use App\Models\User;
Use App\Models\cart;
Use App\Models\wishlist;
Use App\Models\order;
use Session;
use Stripe;



class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $role=Auth::user()->role;
        if ($role== "1")
        {
            return view("dashboard",compact('items'));
        }
        else
        {
            return view("welcome",compact('items'));
        }
    }
    function home(){
        $items = Item::all();
        return view('welcome', compact('items'));
    }

    public function show_cart()
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('user.cart',compact('cart'));
    }
    
    public function show_wishlist()
    {
        $id=Auth::user()->id;
        $wishlist=wishlist::where('user_id','=',$id)->get();
        return view('user.wish_list',compact('wishlist'));
    }

    public function cash_order()
    {
        
        
        return view('user.cash_order');
    }
    
    public function place_Corder(Request $request )
    {
        $user=Auth::user();
        $userid=$user->id;
        
       
        //to get all item with same user id
        $data=cart::where('user_id','=',$userid)->get();
        
        $pdata=User::where('id','=',$userid)->get();
       
        foreach($data as $data)


        {
           $order=new order;
           $order->user_id=$data->user_id;
           $order->user_name=$request->name;
           $order->user_email=$request->mail;
           $order->user_address=$request->address;
           $order->user_phone=$request->phone;

           


           
           
       
   
           $order->item_name=$data->item_name;
           $order->item_id=$data->item_id;
           $order->price=$data->item_price;
           $order->item_quantity=$data->item_quantity;
           $order->payment_mode=0;
           $order->save();


           $cart_id=$data->id;
           $cart=cart::find($cart_id);
           //$this->sendconfmail($order);
           //---------------------------------------
           $this->sendconfmail($cart);
           
           
           
           $cart->delete();
           
           




        }
        //returns to homepage 
        
        return redirect('/');
        //$this->sendconfmail($order);
        
    }
    
    public function card($totalprice)
    {
        
        return view('user.card',compact('totalprice'));
    }
    
    
    
    
    public function stripePost(Request $request,$totalprice)

    {
       

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Welcome" 

        ]);

      

        $user=Auth::user();
        $userid=$user->id;
        
       
        //to get all item with same user id
        $data=cart::where('user_id','=',$userid)->get();
        
        $pdata=User::where('id','=',$userid)->get();
       
        foreach($data as $data)


        {
           $order=new order;
           $order->user_id=$data->user_id;
           $order->user_name=$request->name;
           $order->user_email=$request->mail;
           $order->user_address=$request->address;
           $order->user_phone=$request->phone;

           

   
           $order->item_name=$data->item_name;
           $order->item_id=$data->item_id;
           $order->price=$data->item_price;
           $order->item_quantity=$data->item_quantity;
           $order->payment_mode=1;
           $order->save();


           $cart_id=$data->id;
           $cart=cart::find($cart_id);
           $cart->delete();


           


        }
        //returns to homepage 
        
        return redirect('/');
        $this->sendconfmail($order);

    }

    public function sendconfmail($cart)
    {
        
    
        Mail::to($cart->user_mail)->send(new OrderMail($cart));
    }



}
