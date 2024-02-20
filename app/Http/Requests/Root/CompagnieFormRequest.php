<?php

namespace App\Http\Requests\Root;

use Illuminate\Foundation\Http\FormRequest;

class CompagnieFormRequest extends FormRequest
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
            'name'  => ['required','min:4','string'],
            'sigle' => ['required','min:2','string','max:10'],
            'description' => ['required','min:4','string'],
            'slogant' => ['required','min:4','string','max:255'],
            'patron_id' =>['exists:users,id'],
            'user_id' =>['exists:users,id'],
        ];
    }
}
