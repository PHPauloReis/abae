<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteContactRequest extends FormRequest
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
            'name' => 'required',
            'message' => 'required'
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
            'name.required' => 'Você esqueceu de informar o seu nome!',
            'message.required' => 'Você esqueceu de digitar a sua mensagem!',
            'main_phone.required' => 'Informe ao menos um telefone para contato'
        ];
    }
}
