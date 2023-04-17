<?php

namespace App\Http\Requests\Admin\Estoque;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateEstoque extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.estoque.edit', $this->estoque);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'price' => ['sometimes', 'numeric'],
            'amount' => ['sometimes', 'integer'],
            'places' => ['sometimes'],
            'category' => ['sometimes'],
            'cor' => ['nullable', 'string'],
            'activated' => ['sometimes', 'boolean'],
            'description' => ['nullable', 'string'],

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
