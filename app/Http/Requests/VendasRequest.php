<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $venda_id = $this->route('vendas'); 

        return [
            'cliente_id'=>'required',
            'data_emissao'=>'required|date',
            'numero'=>'required',
            'numero' => [
                'required',
                Rule::unique('vendas')->ignore($venda_id),
            ],
            'valor'=>'required'
        ];
    }
}
