<?php

namespace App\Http\Requests\Voyage;

use Illuminate\Foundation\Http\FormRequest;

class SearchFormRequest extends FormRequest
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
            'compagnie'=>['nullable','string','max:100'],
            'depart'=>['nullable','string','max:100'],
            'destination'=>['nullable','string','max:100'],
            'heure'=>['nullable','string','max:100'],
        ];
    }
}
