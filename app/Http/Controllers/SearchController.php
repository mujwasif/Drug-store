<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\items; // Replace YourModel with the actual model you are using

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Perform your database query based on the search criteria
            $results = YourModel::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $results = collect(); // Empty collection if no search query is provided
        }

        return view('search', compact('results'));
    }
}