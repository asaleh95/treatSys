<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImageValidationRule;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|min:3|max:150',
            'email' => ['required;','email:rfc,dns', Rule::unique('users')->ignore($this->user->id)],
            'phone' => ['required', 'phone:AUTO,EG'],
            'password' => 'required|min:8',
            'image' => ['required', new ImageValidationRule]
        ];
    }
}
