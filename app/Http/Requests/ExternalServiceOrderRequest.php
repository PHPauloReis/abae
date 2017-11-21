<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExternalServiceOrderRequest extends FormRequest
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
            'provider_id' => ['required', 'integer'],
            'job' => ['required'],
            'description' => ['required'],
            'send_date' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'provider_id.required' => 'Você esqueceu de preencher o campo Fornecedor!',
            'provider_id.integer' => 'O campo Fornecedor aceita apenas valores inteiros!',
            'job.required' => 'Você esqueceu de preencher o campo Identificação do serviço!',
            'description.required' => 'Você esqueceu de preencher o campo Descrição do serviço!',
            'send_date.required' => 'Você esqueceu de preencher o campo Data de envio!'
        ];
    }
}
