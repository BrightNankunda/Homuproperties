<?php

namespace App\Http\Controllers;
use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index() {
        $laptop = Laptop::where('id', '=', 1)->first();
        return response()->json($laptop);
    }
    public function store(Request $request) {
        $laptop = new Laptop;
        $laptop = $request->all();
        $laptop->save();

        return response()->json($laptop);
    }
}
