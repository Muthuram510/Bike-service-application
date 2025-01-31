<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'model' => ['required', 'string'],
            'body' => ['nullable'],
            'option1'=>['nullable'],
            'option2'=>['nullable'],
            'option3'=>['nullable'],
            'date' => ['nullable'],
        ];
    }
}
