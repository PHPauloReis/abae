<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorUpdatePasswordRequest extends FormRequest
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
        $rules = [
            'old_password' => ['required'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['same:password']
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Você esqueceu de informar sua senha atual!',
            'password.required' => 'Você esqueceu de preencher o campo Senha!',
            'password.min' => 'Sua senha deve ter ao menos 6 dígitos!',
            'password_confirmation.same' => 'Os campos Senha e Confirmação de Senha não coincidem!'
        ];
    }
}
