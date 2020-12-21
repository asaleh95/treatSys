<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImageValidationRule;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
            'phone' => ['required', 'phone:AUTO,EG'],
            'location' => ['required', 'regex:/^(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)$/'],
            'address' => 'required|min:3|max:150',
            'position' => 'required|min:3|max:150',
            'rate' => 'required|numeric',
            'basic_price' => 'required|numeric',
            'treat_price' => 'required|numeric',
            'about' => 'required|min:3|max:150',
            'image' => ['required', new ImageValidationRule]
        ];
    }
}
