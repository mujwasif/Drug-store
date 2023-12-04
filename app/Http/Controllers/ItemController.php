<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
Use App\Models\Item;
Use App\Models\cart;
Use App\Models\wishlist;




class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $items = Item::all();
        $total_item = Item::count();
        return view('item.index', compact('items'));
    }
    function insert(Request $request){
        Item::insert([
            'item_name' => $request->item_name,
            'item_details' => $request->item_details,
            'item_type' => $request->item_type,
            'item_sell_price' => $request->item_sell_price,
            'item_real_price' => $request->item_real_price,
            'item_generic_name' => $request->item_generic_name,
            'item_dealer_name' => $request->item_dealer_name,
            'item_company_name' => $request->item_company_name,
            'item_quantity' => $request->item_quantity,
            'item_strength' => $request->item_strength,
            'item_stock' => $request->item_stock,
            'item_added_by' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
        return back()->with('status','Item Added Successfully!');
        }
    public function order(Request $request,$item_id){
        if(Auth::id())       
        {
            $user=Auth::user();
            $item=item::find($item_id);
            $cart=new cart;
            
            $cart->user_name=$user->name;
            $cart->user_id=$user->id;
            $cart->user_mail=$user->email; 
            $cart->item_name=$item->item_name;
            $cart->item_id=$item->id;
            $cart->item_price=$item->item_sell_price;
            $cart->item_quantity=$request->quantity;
            $cart->save();
            


            $order_item = Item::find($item_id);
            $sold=$request->quantity;
            $stock = $order_item->item_stock;
            $order_item->item_stock = $stock-$sold;
            $order_item->save();
            return back();

            
        }
        else
        {
            return redirect("login");
        }
    
        }
    public function remove_cart($id,$item_id){
        {

        $cart=cart::find($id);
        
        $order_item = Item::find($item_id);
        $sold=$cart->item_quantity;
        $stock = $order_item->item_stock;
        $order_item->item_stock = $stock+$sold;
        $order_item->save();

        $cart->delete();
        return redirect()->back();



        }
    }

    public function add_wishlist($item_id){
        if(Auth::id())       
        {
            $user=Auth::user();
            $item=item::find($item_id);
            $wishlist=new wishlist;
            
            $wishlist->user_name=$user->name;
            $wishlist->user_id=$user->id;
            $wishlist->user_mail=$user->email; 
            $wishlist->item_name=$item->item_name;
            $wishlist->item_id=$item->id;
            $wishlist->item_price=$item->item_sell_price;
            $wishlist->save();
            


            
            return back();

            
        }
        else
        {
            return redirect("login");
        }
   


        }
    
    public function remove_wishlist($id,$item_id){
        {
    
            $wishlist=wishlist::find($id);
            
    
            $wishlist->delete();
            return redirect()->back();
    
    
    
       }
       }
    public function wish_order(Request $request,$item_id){
             
        {  
            $user=Auth::user();
            $item=item::find($item_id);
            $cart=new cart;
            
            $cart->user_name=$user->name;
            $cart->user_id=$user->id;
            $cart->user_mail=$user->email; 
            $cart->item_name=$item->item_name;
            $cart->item_id=$item->id;
            $cart->item_price=$item->item_sell_price;
            $cart->item_quantity=$request->wish_quantity;
            $cart->save();
            


            $order_item = Item::find($item_id);
            $sold=$request->quantity;
            $stock = $order_item->item_stock;
            $order_item->item_stock = $stock-$sold;
            $order_item->save();
            return back();
        }    

            
       
        }
}