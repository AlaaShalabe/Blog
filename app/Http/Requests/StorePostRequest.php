<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'titel' => 'required|string|min:5|max:55',
            'category_id' => 'required|numeric|exists:categories,id',
            'tag_id' => 'required|numeric|exists:tags,id',
            'content' => 'required|string|min:20',
            'imge' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
