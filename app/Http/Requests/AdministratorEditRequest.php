<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorEditRequest extends FormRequest
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
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'access_level' => ['required', 'integer'],
            'password_confirmation' => ['same:password']
        ];

        if(!empty($this->get('password'))) {
            $rules['password'] = ['required', 'min:6'];
        }

        return $rules;
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
