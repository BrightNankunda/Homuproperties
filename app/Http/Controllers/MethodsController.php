<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\methods;

class MethodsController extends Controller
{
    public function index() 
    {
        $methods = methods::where('boss_id', Auth()->user()->id)->first();
        return response()->json($methods);
    }
    public function store(Request $request)
    {
        $request->validate([
            'mtn_no' => 'string',
            'airtel_no' => 'string',
            
        ]);
        $methods = new methods;
        
        $methods->boss_id = Auth()->user()->id;
        $methods ->mtn_no = $request->mtn_no;
        $methods->airtel_no = $request->airtel_no;
        
        $methods->save();

        return response()->json($methods);
    }
    public function update(Request $request, methods $methods)
    {
        $data = $request->validate([
            'mtn_no' => 'string',
            'airtel_no' => 'string',
            
        ]);

        $methods->update($data);

        return response()->json([
            'Updated' => $data,
            'Message' => 'Methods Data updated'
        ]);
    }
}
