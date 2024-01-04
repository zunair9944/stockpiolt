<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CasestudiesRequest extends FormRequest
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
                'title' => 'required|string|max:255|min:5',
                'description' => 'required|string|min:30',
            ];
        }else{
            return [
                'title' => 'required|string|max:255|min:5',
                'description' => 'required|string|min:30',
                'image' => 'required|mimes:jpeg,png,jpg'
            ];
        }
    }
}
