<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImageValidationRule;
use Illuminate\Validation\Rule;

class UpdateLabRequest extends FormRequest
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
            'email' => ['required', 'email:rfc,dns', Rule::unique('labs')->ignore($this->lab->id)],
            'phone' => ['required', 'regex:/^(0|\+)?(201)(\d{9})$/'],
            'dicount' => 'required|numeric',
            'region' => 'required|min:3|max:150',
            'distance' => 'required|numeric',
            'location' => ['required', 'regex:/^(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)$/'],
            'address' => 'required|min:3|max:150',
            'rate' => 'required|numeric',
            'number_of_raters' => 'required|numeric',
            'number_of_views' => 'required|numeric',
            'about' => 'required|min:3|max:150',
            'logo' => ['required', new ImageValidationRule],
            'images' => ['required', 'array'],
            'images.*' => ['required', new ImageValidationRule]
        ];
    }
}
