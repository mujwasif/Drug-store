<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
Use App\Models\Item;

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
    function order($item_id){
        $order_item = Item::find($item_id);
        $stock = $order_item->item_stock;
        $order_item->item_stock = $stock-1;
        $order_item->save();
        return back();
    }
}
