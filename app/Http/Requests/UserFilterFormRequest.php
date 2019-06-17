<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterFormRequest extends FormRequest
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
            'name' => 'nullable|max:250',
            'email' => 'nullable|email|max:300',
            'dateFirst' => 'nullable|date_format:d-m-Y H:i:s',
            'dateEnd' => 'nullable| date_format:d-m-Y H:i:s'
        ];

    }

    public function messages()
    {
        return [
            'name.max' => 'Excedeu a quantidade de caracteres',
            'email.max' => 'Excedeu a quantidade de caracteres',
            'email.email' => 'Não é um e-mail valido',
            'dateFirst.date_format' => 'Não é uma data valida',
            'dateEnd.date_format' => 'Não é uma data valida'
        ];

    }
}
