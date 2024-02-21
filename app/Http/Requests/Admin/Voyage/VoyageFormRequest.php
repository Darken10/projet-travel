<?php

namespace App\Http\Requests\Admin\Voyage;

use Illuminate\Foundation\Http\FormRequest;

class VoyageFormRequest extends FormRequest
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
            'depart_id' => ['required', 'exists:villes,id'],
            'destination_id' => ['required', 'exists:villes,id'],
            'heure_depart'=>['required'],
            'heure_arriver'=>['required'],
            'admin_id' => ['exists:users,id'],
            'course_id' => ['exists:courses,id'],
            'compagnie_id' => ['exists:compagnies,id'],
            'statut_id' => ['exists:statuts,id'],
            'prix' => ['required','numeric'],
        ];
    }
}
