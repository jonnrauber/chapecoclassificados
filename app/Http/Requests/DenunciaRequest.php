<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DenunciaRequest extends Request
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
            'motivo' => 'required',
            'emaild' => 'different:emaila'
        ];
    }

    public function messages()
    {
      return [
        'motivo.required' => 'Por favor escreva o motivo de sua denúncia.',
        'emaild.different' => 'Você não pode denunciar uma publicação sua.'
      ];
    }
}
