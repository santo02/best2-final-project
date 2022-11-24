<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => ['required'],
            'title' => ['required', Rule::unique('posts', 'title')->ignore($this->post)],
            'category'  => ['required'],
            'post_image'  => ['required'],
            'post_detail' => ['required'],
            'user_id' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'title')->ignore($this->post)],
        ];
    }
}
