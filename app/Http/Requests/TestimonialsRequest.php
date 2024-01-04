<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TestimonialsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     // return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        
        if($request->has('id')){
            return [
                'client_name' => 'required|string|max:255|min:5',
                'star_rating' => 'required|string',
                'body' => 'required|string|min:30',
                'subject' => 'required|string|min:5',
            ];
        }else{
            return [
                'client_name' => 'required|string|max:255|min:5',
                'star_rating' => 'required|string',
                'body' => 'required|string|min:30',
                'subject' => 'required|string|min:5',
                'image' => 'required|mimes:jpeg,png,jpg'
            ];
        }
    }
}
