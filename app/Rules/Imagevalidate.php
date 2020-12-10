<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Imagevalidate implements Rule
{

    private $data;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data;
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
        if(strtolower($this->data['provider']) == 'google'){
            return [
                'image_file' => 'image:jpeg,jpg|max:2048|dimensions:ratio=4/3'
            ];
        }

        if(strtolower($this->data['provider']) == 'snapchat'){
            return [
                'image_file' => 'image:jpeg,jpg,gif|max:5242|dimensions:ratio=16/9'
            ];
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if(strtolower($this->data['provider']) == 'google'){
            return 'Image must be in aspect ratio 4:3 and < 2 mb size';
        }

        if(strtolower($this->data['provider']) == 'snapchat'){
            return 'Image must be in aspect ratio 16:9 and < 5 mb size';
        }
        
    }
}
