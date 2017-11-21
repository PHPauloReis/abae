<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'company_name' => ['required'],
            'main_phone' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Você esqueceu de informar o nome do fornecedor!',
            'main_phone.required' => 'Você esqueceu de informar o telefone do fornecedor!'
        ];
    }
}
