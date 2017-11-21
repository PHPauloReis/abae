<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'date_of_birth' => ['required'],
            'code' => ['required'],
            'name' => ['required'],
            'gender' => ['required'],
            'mothers_name' => ['required'],
            'fathers_name' => ['required'],
            'address' => ['required'],
            'district' => ['required'],
            'zipcode' => ['required'],
            'main_mobile' => ['required'],
            'practice_day' => ['required'],
            'activity_location' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'date_of_birth.required' => 'Você esqueceu de informar o campo Data de nascimento',
            'code.required' => 'Você esqueceu de informar o campo Registro',
            'name.required' => 'Você esqueceu de informar o campo Nome do praticante',
            'gender.required' => 'Você esqueceu de informar o campo Sexo',
            'mothers_name.required' => 'Você esqueceu de informar o campo Nome da mãe',
            'fathers_name.required' => 'Você esqueceu de informar o campo Nome do pai',
            'address.required' => 'Você esqueceu de informar o campo Endereço',
            'district.required' => 'Você esqueceu de informar o campo Bairro',
            'zipcode.required' => 'Você esqueceu de informar o campo CEP',
            'main_mobile.required' => 'Você esqueceu de informar o campo Telefone Celular Principal',
            'practice_day.required' => 'Você esqueceu de informar o campo Dia da prática',
            'activity_location.required' => 'Você esqueceu de informar o campo Local de atividade',
        ];
    }
}
