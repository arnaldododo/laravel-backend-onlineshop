<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|max:20',
            'address' => 'required',
            'transaction_total' => 'required|integer',
            'transaction_status' => 'nullable|string|in:PENDING,SUCCESS,FAILED',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exists:products,id'
        ];
    }
}
