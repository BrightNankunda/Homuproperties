<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function see()
    {
        $images = Image::where('boss_id', auth()->user()->id)->get();
        return response()->json($images);
    }
    public function preferredlocation(Request $request, $location) {
        // $properties = Image::where('location', '=', $location)->get();
        $properties = Image::where('location', 'like', "%$location%")->orWhere('address', 'like', "%$location%")->orWhere('street', 'like', "%$location%")->orWhere('name', 'like', "%$location%")->get();
        $count = $properties->count();
        // return response($count);
        if($count > 0) {
            return response()->json($properties);
        } else {
            return $this->uploads();
        }
    }
    public function late() {
        $image = Image::whereLocationAndType('Kawempe', 'Apartment')->limit(1)->get();
        return response()->json($image);
    }
    public function later() 
    {
        $image = Image::where('boss_id', auth()->user()->id)->orderBy('created_at', 'desc')->limit(1)->first();
        return response()->json($image);
    }
    public function hostel()
    {
        $hostels = Image::where('type', 'hostel')->get();
        return response()->json($hostels);
    }
    public function arcade()
    {
        $arcades = Image::where('type', 'arcade')->get();
        return response()->json($arcades);
    }
    public function apartment()
    {
        $apartments = Image::where('type', 'apartment')->get();
        return response()->json($apartments);
    }
    public function rental()
    {
        $rentals = Image::where('type', 'rental')->get();
        return response()->json($rentals);
    }
    public function mall()
    {
        $malls = Image::where('type', 'mall')->get();
        return response()->json($malls);
    }
    public function officespace()
    {
        $officespaces = Image::where('type', 'officespace')->get();
        return response()->json($officespaces);
    }
    
    public function fone ()
    {
        $fone = Image::where('amount', '>', 2000)->first();
        return response()->json($fone);
    } 
    public function ftwo()
    {
        $ftwo = Image::where('amount', '<', 2000)->first();
        return response()->json($ftwo);
    }
    public function fmukono()
    {
        $fmukono = Image::where('location', 'Mukono')->first();
        return response()->json($fmukono);
    }
    public function fKira()
    {
        $fkira = Image::where('location', 'Kira')->first();
        return response()->json($fkira);
    }
    

    public function uploads()
    {
        $uploads = Image::all();
        return response()->json(["uploads" => $uploads]);
    }
    public function upload(ImageRequest $request)
    {
        // if($request->hasFile('image')){
        //     $name = time().".".$request->file('image')->getClientOriginalName();
        //     $request->file('image')->move(public_path('images'), $name);
        
        //     $img = new Image;
        //     $img->image = $name;
        //     $img->save();
        // }
        $img = new Image;
        
        $img->boss_id = Auth()->user()->id;
        $img->name = $request->name;
        $img->type = $request->type;
        $img->status = $request->status;
        $img->astatus = $request->astatus;
        $img->hstatus = $request->hstatus;
        $img->category = $request->category;
        $img->location = $request->location;
        $img->address = $request->address;
        $img->street = $request->street;
        $img->description = $request->description;
        $img->rooms = $request->rooms;
        $img->floor = $request->floor;
        $img->rent = $request->rent;

        $img->amount = $request->amount;
        if($img->amount < 120000) {
            $img->amount = 120000;
        }
        $img->contact = $request->contact;

        if($request->hasFile('front')) {
            $front = time().".".$request->file('front')->getClientOriginalName();
            $request->file('front')->move(public_path('images'), $front);
        }

        if($request->hasFile('image')){
            $name = time().".".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        
        }
        
        if($request->hasFile('photo')){
            $photoName = time().".".$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'), $photoName);
        }

        if($request->hasFile('imageone')) {
            $imageone = time().".".$request->file('imageone')->getClientOriginalName();
            $request->file('imageone')->move(public_path('images'), $imageone);
        }

        if($request->hasFile('imagetwo')) {
            $imagetwo = time().".".$request->file('imagetwo')->getClientOriginalName();
            $request->file('imagetwo')->move(public_path('images'), $imagetwo);
        }
        $img->front = $front;
        $img->image = $name;
        $img->photo = $photoName;
        $img->imageone = $imageone;
        $img->imagetwo = $imagetwo;
        $img->secret = Auth()->user()->id.rand(1, 9).rand(11, 99);
        $img->paid = false;
        $img->save();

        return response()->json([
            $img,
            
            'image' => "'/images'/$name",
            'photo' => "'/images/'$photoName",
            'message' => $img ? 'Data inserted in the database successfully' : 'Error Please dont create another one'   
        ]);
        
    }
    public function count() 
    {
        $images = Image::get()->all();
        return response()->json($images);
    }

    public function show($id)
    {
        $image = Image::where('id', $id)->first();
        return response()->json($image);
    }
    // public function like(Request $request, User $user, Image $image) {
    public function like(Request $request) {
        DB::transaction(function () use($request){
            $user = User::findOrFail($request->userId);
            $user->liked = $request->newLiked;
            $user->save();           
            
            $image = Image::findOrFail(request()->propertyId);
            $image->likes = $request->newLikes;
            $image->save();
        });
        
        return response()->json(User::findOrFail(1)->liked);
       
    }
    // public function approve() {
        // $approved = Image::where('id', $id)->first();
    // }
    
}
