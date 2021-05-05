<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'type' => 'required|string',
            'category' => 'required|string',
            'location' => 'required|string',
            'address' => 'required|string',
            'street' => 'required|string',
            'description' => 'required|string',
            'rooms' => 'required|string',
            'floor' => 'required|string',
            'rent' => 'required|string',
            //'amount' => 'reqiured|string',
            'contact' => 'required|string',
            'front' => 'required|image|mimes:jpg,jpeg',
            'image' => 'required|image|mimes:jpg,jpeg',
            'photo' => 'required|image|mimes:jpg,jpeg',
            'imageone' => 'required|image|mimes:jpg,jpeg',
            'imagetwo' => 'required|image|mimes:jpg,jpeg',
        ];
    }
}
