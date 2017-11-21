<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => ['required'],
            'subtitle' => ['required'],
            'text' => ['required'],
            'file' => ['mimes:jpg,png,gif']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Você esqueceu de preencher o campo Título!',
            'subtitle.required' => 'Você esqueceu de preencher o campo Resumo!',
            'text.required' => 'Você esqueceu de preencher o campo Texto!',
            'file.mimes' => 'O arquivo que você está tentando enviar não é aceito. Envie apenas arquivos JPG, PNG e GIF'
        ];
    }
}
