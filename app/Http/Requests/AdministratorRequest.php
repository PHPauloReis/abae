<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
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
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'access_level' => ['required', 'integer'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['same:password']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Você esqueceu de preencher o campo Nome!',
            'username.required' => 'Você esqueceu de preencher o campo Username!',
            'email.required' => 'Você esqueceu de preencher o campo E-mail!',
            'access_level.required' => 'Você esqueceu de informar o Nível de acesso',
            'access_level.integer' => 'O campo Nível de acesso só aceita valores inteiros',
            'password.required' => 'Você esqueceu de preencher o campo Senha!',
            'password.min' => 'Sua senha deve ter ao menos 6 dígitos!',
            'password_confirmation.same' => 'Os campos Senha e Confirmação de Senha não coincidem!'
        ];
    }
}
