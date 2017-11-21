<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryContentRequest extends FormRequest
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
            // 'photo' => ['mimes:jpg,jpeg,gif,png', 'required']
            'photo' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'photo.required' => 'O campo Imagem é obrigatório!',
            // 'photo.mimes' => 'O arquivo que você está tentando enviar não é aceito pelo sistema! Envie apenas arquivos JPG, GIF ou PNG'
        ];
    }
}
