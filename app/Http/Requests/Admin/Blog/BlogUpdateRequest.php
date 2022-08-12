<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogUpdateRequest extends FormRequest
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
            'published_at'  => ['nullable', 'date'],
            'slug'          => ['required', 'min:3', 'max:255', Rule::unique('blogs')->ignore($this->blog->id)],
            'title'         => ['required', 'min:3', 'max:255'],
        ];
    }
}
