<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ComentarioRequest extends Request
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
            'emailc' => 'required',
            'msg' => 'required'
        ];
    }

    public function messages() {
      return [
        'emailc.required' => 'Sua sessão parece ter expirado. Recarregue a página.',
        'msg.required' => 'Preencha o campo comentário'
      ];
    }
}
