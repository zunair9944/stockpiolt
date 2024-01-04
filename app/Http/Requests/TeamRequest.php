<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TeamRequest extends FormRequest
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
                'name' => 'required|string|max:255|min:5',
                'dsignation' => 'required|string|min:3',
            ];
        }else{
            return [
                'name' => 'required|string|max:255|min:5',
                'dsignation' => 'required|string|min:3',
                'image' => 'required|mimes:jpeg,png,jpg'
            ];
        }
    }
}
