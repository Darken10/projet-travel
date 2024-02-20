<?php

namespace App\Http\Requests\Admin\Voyage;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
            'depart_id' => ['exists:villes,id'],
            'destination_id' => ['exists:villes,id'],
            'heure_depart' => ['string'],
            'heure_arriver' => ['string'],
            
        ];
    }
}
