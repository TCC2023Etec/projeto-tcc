<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePostagem extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|integer|exists:postagens,id',
            'titulo' => 'required|string',
            'descricao' => 'required|string|max:255',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
