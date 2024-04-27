<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:50','unique:tags,name'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    function failedValidation(Validator $validator)
    {
        return response()->json([
            'error'=>true,
            'success'=> false,
            'status_code'=>422,
            'status_message'=>'Une erreur est survenue',
            'errors_message'=> $validator->errors(),
            
        ]);
    }


}
