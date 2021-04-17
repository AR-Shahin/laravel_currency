<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashOutRequest extends FormRequest
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
            'amount' => ['required', 'numeric'],
            'user_id' => ['required'],
            'currency_id' => ['required'],
            'password' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'currency_id.required' => 'This field is required!'
        ];
    }
}
