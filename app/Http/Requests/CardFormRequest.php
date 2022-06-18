<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardFormRequest extends FormRequest
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
        return [    // Same format as the validate() function
            'name' => 'required',
            'type' => 'required',
            'current_limit' => ['required', 'integer']
        ];
    }
    
    protected function prepareForValidation() {
        $this->merge([
            'name' => strip_tags($this['name']),
            'type' => strip_tags($this['type']),
            'current_limit' => strip_tags($this['current_limit'])
        ]);
    }
    
}
