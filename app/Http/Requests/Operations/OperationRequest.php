<?php

namespace App\Http\Requests\Operations;

use Illuminate\Foundation\Http\FormRequest;

class OperationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|max:255|string',
            'amount'       => 'required|numeric',
            'account1'     => 'required',
            'side1'        => 'required',
            'sign1'        => 'required',
            'account2'     => 'required',
            'side2'        => 'required',
            'sign2'        => 'required',
            'creation_day' => 'required|date_format:Y-m-d',
        ];
    }
}
