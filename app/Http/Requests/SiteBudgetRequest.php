<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteBudgetRequest extends FormRequest
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
        // Obtem os dados enviados pelo formulário
        $formData = $this->all();

        $rules = [
            'responsible' => 'required',
            'description' => 'required'
        ];

        // Se ambos os telefones estiverem vazios, obriga que o usuário informe o telefone principal
        if(empty($formData['main_phone']) && empty($formData['secondary_phone'])) {
            $rules['main_phone'] = 'required';
        }

        return $rules;
    }
    
    public function messages()
    {
        return [
            'responsible.required' => 'Você esqueceu de informar o seu nome!',
            'description.required' => 'Você esqueceu de digitar as informações técnicas do material que você quer orçar!',
            'main_phone.required' => 'Informe ao menos um telefone para contato'
        ];
    }
}
