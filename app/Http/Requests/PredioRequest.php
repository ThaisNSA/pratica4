<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PredioRequest extends FormRequest
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
            'titulo' => 'bail|required|min:2|max:100',
            'cidade_id' => 'bail|required|integer',
            'preco' => 'bail|required|numeric|min:0',
            'andar' => 'bail|required|numeric|min:0',
            'sala' => 'bail|required|numeric|min:0',
            'banheiro' => 'bail|required|numeric|min:0',
            'auditorio' => 'bail|required|numeric|min:0',
            'estvag' => 'bail|required|numeric|min:0',
            'descrição' => 'bail|nullable|string',
            'rua' => 'bail|required|min:1|max:100',
            'numero' => 'bail|required|integer',
            'complemento' => 'bail|nullable|string',
            'pontoref' => 'bail|nullable|string',
            'bairro' => 'bail|required|min:3|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'cidade_id' => 'cidade',
            'estvag' => 'quantidade de vagas no estacionamento',
            'pontoref' => 'ponto de referência',
            'preco' => 'preço',
            'andar' => 'quantidade de andares',
            'sala' => 'quantidade de salas',
            'banheiros' => 'quantidades de banheiros',
            'descricao' => 'informações desse campo',
            'numero' => 'número',
            'titulo' => 'título'
        ];
    }
}
