<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintRequest extends FormRequest
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
            'job' => ['required'],
            'printer_id' => ['required'],
            'size' => ['required'],
            'amount' => ['required', 'integer', 'greater_or_equals_than:losses'],
            'print_date' => ['required', 'before:' . date("Y-m-d", strtotime('+1 days'))],
        ];

        // dd($this->get('print_date'));

        if(!empty($this->get('losses'))) {
            $rules['losses'] = ['integer'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'job.required' => 'Você esqueceu de informar o título do trabalho impresso!',
            'printer_id.required' => 'Você esqueceu de informar qual impressora utilizada!',
            'customer_others.required' => 'Você esqueceu de informar para qual cliente foi esse trabalho!',
            'size.required' => 'Você esquece de informar o tamanho desse trabalho!',
            'amount.greater_or_equals_than' => 'O campo Perdas, não pode ser menor que o campo Impressões',
            'amount.required' => 'Você esqueceu de informar a quantidade impressa!',
            'amount.integer' => 'O campo Perdas, só aceita valores inteiros!',
            'losses.integer' => 'O campo Perdas, só aceita valores inteiros!',
            'print_date.required' => 'Você esqueceu de preencher o campo Data da impressão!',
            'print_date.before' => 'A data de impressão não pode ser futura!'
        ];
    }
}
