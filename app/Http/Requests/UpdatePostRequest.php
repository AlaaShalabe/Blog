<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'titel' => 'string|min:5|max:55',
            'category_id' => 'numeric|exists:categories,id',
            'tags' => 'exists:tags,id',
            'content' => 'string|min:20',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
