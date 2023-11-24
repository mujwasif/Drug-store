<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Item;

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
}
