<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogStoreRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expired_at'    => ['nullable', 'date'],
            'featured_at'   => ['nullable', 'date'],
            'image_url'     => ['required', 'url'],
            'main_content'  => ['required'],
            'additional_content'  => ['nullable'],
            'published_at'  => ['nullable', 'date'],
            'slug'          => ['required', 'min:3', 'max:255', 'unique:blogs'],
            'title'         => ['required', 'min:3', 'max:255'],
        ];

    }
}
