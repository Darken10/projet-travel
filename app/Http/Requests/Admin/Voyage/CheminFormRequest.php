<?php

namespace App\Http\Requests\Admin\Voyage;

use Illuminate\Foundation\Http\FormRequest;

class CheminFormRequest extends FormRequest
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
        return [
            'chemin_precedent' => ['nullable','exists:chemins,id'],
            'chemin_suivant' => ['nullable','exists:chemins,id'],
            'statut_id' => ['nullable','exists:statuts,id'],
            'ville_id' => ['required','exists:villes,id'],
        ];
    }
}
