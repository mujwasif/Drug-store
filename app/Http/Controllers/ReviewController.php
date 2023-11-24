<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
Use App\Models\Review;
Use App\Models\Item;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index($item_id){
        return view('review.index',compact('item_id'));
    }
    function insert(Request $request){

        $items = Item::all();
        Review::insert([
            'comments'=> $request->comments,
            'item_id'=> $request->item_id,
            'rating'=> $request->rating,
            'review_by' =>Auth::id(),
            'created_at' => Carbon::now()
        ]);
        return view('welcome', compact('items'));   
    }
    function show($item_id){
        $reviews=Review::where("item_id","=",$item_id)->get();
        //print_r($reviews);
        //echo $item_id;
        return view('review.show',compact('reviews'));

    }
}
