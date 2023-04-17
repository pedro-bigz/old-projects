<?php

namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedido.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'string'],
            'bol_parcelado' => ['required', 'boolean'],
            'num_parcelas' => ['nullable', 'integer'],
            'valor_parcela' => ['nullable', 'numeric'],
            'valor_total' => ['nullable', 'numeric'],
            'prazo_entrega' => ['required', 'integer'],
            'cod_entrega' => ['required', 'integer'],
            'tipo_pagamento_id' => ['required', 'integer'],
            'activated' => ['required', 'boolean'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
