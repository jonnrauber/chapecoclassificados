<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InteresseRequest extends Request
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
        'emaila' => 'different:emaili',
        'msg' => 'required'
      ];
    }

    public function messages() {
      return [
        'emaila.different' => 'Você não pode se interessar por um anúncio seu!',
        'msg.required' => 'Você deve preencher o campo mensagem.'
      ];
    }
}
