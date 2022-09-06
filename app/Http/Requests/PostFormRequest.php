<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            //
        ];

        if (in_array($this->method(), ['POST'])) {
            $rules['image'] = ['required', 'mimes:jpg,png,jpeg', 'max:5058'];
            $rules['body'] = 'required';
            $rules['excerpt'] = 'required';
            $rules['title'] = 'required|unique:posts|max:225';
        }

        return $rules;
    }
}
