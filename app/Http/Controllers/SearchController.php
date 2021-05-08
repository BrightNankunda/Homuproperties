<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // $request->validate([
        //     'query' => 'required'
        // ]);
        $queryName = $request->input('name');
        $queryLocation = $request->input('Location');
        $queryMinRent = $request->input('minimumRent') ?? 20000;
        $queryMaxRent = $request->input('maximumRent') ?? 6000000;

        $results = Image::where('location', 'like', "%$queryLocation%")
            ->orWhere('address', 'like', "%$queryLocation%")
            ->orWhere('street', 'like', "%$queryLocation%")
            ->orWhere('name', 'like', "%$queryName%")
            ->whereBetween('rent', [$queryMinRent, $queryMaxRent])
            ->get();
        
        return response()->json($results);
        
       
        
    }
}
