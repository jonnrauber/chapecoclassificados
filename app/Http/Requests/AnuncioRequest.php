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
          'tituloa' => 'required|max:100|unique_with:anuncios,emaila',
          'descricao' => 'required',
          'valor' => 'numeric',
          'qtitens' => 'integer'
        ];
    }

    public function messages()
    {
      return [
        'tipo.required' => 'Selecione o tipo do seu anúncio.',
        'codc.required' => 'Selecione a categoria.',
        'codp.required' => 'Selecione o método de pagamento.',
        'tituloa.required' => 'Preencha o título do anúncio.',
        'tipo.max' => 'O tamanho máximo do título deve ser de 100 caracteres.',
        'tituloa.unique_with' => 'Você já possui um anúncio com o mesmo título.',
        'descricao.required' => 'Preencha a descrição do anúncio.',
        'valor.numeric' => 'Você deve desejar um valor numérico valido.',
        'qtitens.integer' => 'A quantidade de itens deve ser um número inteiro.'
      ];
    }
}
