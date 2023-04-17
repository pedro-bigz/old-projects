<?php

namespace App\Http\Requests\Admin\LojaLocal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateLojaLocal extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.loja-local.edit', $this->lojaLocal);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'logradouro' => ['sometimes', 'string'],
            'numero' => ['sometimes', 'int'],
            'bairro' => ['sometimes', 'string'],
            'cidade' => ['nullable', 'string'],
            'uf' => ['nullable', 'string'],
            'cep' => ['sometimes', 'string'],
            'activated' => ['sometimes', 'boolean'],

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
