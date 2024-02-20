<?php

namespace App\Http\Requests\Root;

use Illuminate\Foundation\Http\FormRequest;

class PaysFormRequest extends FormRequest
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
            'name'=>['required','min:4','string'],
            'numero_identifiant' =>['required','min:3','string','max:6']
        ];
    }
}
