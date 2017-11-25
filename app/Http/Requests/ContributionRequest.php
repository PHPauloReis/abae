<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContributionRequest extends FormRequest
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
            'payment_date' => ['required', 'date'],
            'value' => ['required', 'numeric'],
            'month' => ['required', 'integer'],
            'year' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'payment_date.required' => 'Você esqueceu de informar o campo Data de pagamento',
            'payment_date.date' => 'O campo data de pagamento deve conter uma data válida',
            'value.required' => 'Você esqueceu de informar o valor de pagamento',
            'value.numeric' => 'O campo valor de pagamento aceita apenas valores numéricos',
            'month.required' => 'Você esqueceu de informar o mês de referência',
            'month.integer' => 'O campo mês de referência aceita apenas valores inteiros',
            'year.integer' => 'Você esqueceu de informar o ano de referência',
            'year.integer' => 'O campo ano de referência aceita apenas valores inteiros'
        ];
    }
}
