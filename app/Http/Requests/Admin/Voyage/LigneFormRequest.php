<?php

namespace App\Http\Requests\Admin\Voyage;

use Illuminate\Foundation\Http\FormRequest;

class LigneFormRequest extends FormRequest
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
            'destination_id' => ['exists:villes,id'],
            'depart_id' => ['exists:villes,id'],
            'distance'=> ['numeric','min:0','max:1000'],
        ];
    }
}
