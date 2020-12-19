<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if (preg_match('/^data:image\/(\w+);base64,/', $value)) {
            $value = substr($value, strpos($value, ',') + 1);
        }
        $image = base64_decode($value);
        $f = finfo_open();
        $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        return in_array($result,['image/png', 'image/jpeg', 'image/jpg','image/svg']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Base64 Image.';
    }
}
