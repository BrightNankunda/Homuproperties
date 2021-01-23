<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $query = $request->input('query');

        $results = Image::where('location', 'like', "%$query%")->orWhere('address', 'like', "%$query%")->orWhere('street', 'like', "%$query%")->orWhere('name', 'like', "%$query%")->get();
        
             return response()->json($results);
        
       
        
    }
}
