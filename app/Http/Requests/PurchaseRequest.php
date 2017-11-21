<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'supply_id' => ['required', 'integer'],
            'amount' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'supply_id.required' => 'Você esqueceu de preencher o campo Produto!',
            'supply_id.integer' => 'O campo Produto deve ser do tipo inteiro!',
            'amount.required' => 'Você esqueceu de preencher o campo Quantidade!',
            'amount.integer' => 'O campo Produto deve ser do tipo inteiro!'
        ];
    }
}
