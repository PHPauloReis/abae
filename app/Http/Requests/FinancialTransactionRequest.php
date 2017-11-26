<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinancialTransactionRequest extends FormRequest
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
            'type' => ['required', 'integer'],
            'chart_of_account_id' => ['required', 'integer'],
            'value' => ['required'],
            'transaction_date' => ['required', 'date']
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Você esqueceu de informar o tipo de movimentação',
            'type.integer' => 'O campo tipo de movimentação deve ser do tipo inteiro',
            'chart_of_account_id.required' => 'Você esqueceu de informar o Plano de conta',
            'chart_of_account_id.integer' => 'O campo Plano de conta deve ser do tipo inteiro',
            'value.required' => 'Você esqueceu de informar o valor da movimentação',
            'transaction_date.required' => 'Você esqueceu de informar a data da movimentação',
            'transaction_date.date' => 'O campo data da movimentação deve ser do tipo date'
        ];
    }
}
