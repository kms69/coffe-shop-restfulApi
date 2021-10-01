<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_number'=>'unique:orders|required|BigInteger',
            'item_count'=>'unique:orders|required|Integer',
          'price'=>'required|BigInteger',
            'quantity'=>'unique:order_details|required|integer',
            'status' => [
                'required',
                Rule::in(['waiting', 'preparation', 'ready','delivered']),
                ],
            'user_id'=>'unique:orders|required|integer',
            'order_id'=>'unique:order_details|required|integer',
            'product_id'=>'unique:order_details|required|integer',

        ];
    }
}
