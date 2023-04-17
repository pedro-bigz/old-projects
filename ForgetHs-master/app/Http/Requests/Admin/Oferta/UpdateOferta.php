<?php

namespace App\Http\Requests\Admin\Oferta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateOferta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.oferta.edit', $this->ofertum);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'estoque_id' => ['sometimes', 'string'],
            'desconto' => ['sometimes', 'numeric'],
            'description' => ['nullable', 'string'],
            'nivel' => ['nullable', 'integer'],
            'activated' => ['sometimes', 'boolean'],
            'data_inicio' => ['sometimes', 'date'],
            'data_fim' => ['sometimes', 'date'],

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
