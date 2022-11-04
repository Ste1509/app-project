<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=> 'required|max:255',
            'description'=> 'required',
            'author'=> 'required|max:255',
            'editorial'=> 'required|max:255',
            'year'=> 'required',
            'number_pages'=> 'required',
            'price'=> 'required',
            'image'=> 'required|max:255',
            'category_id'=>'required'
        ];
    }
}
