<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnuncioRequest extends Request
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
          'tipo' => 'required',
          'codc' => 'required',
          'codp' => 'required',
          'tituloa' => 'required|max:100',
          'descricao' => 'required',
          'valor' => 'numeric',
          'qtitens' => 'integer'
        ];
    }
}
