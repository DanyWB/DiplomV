<?php

namespace App\Http\Requests\Article;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'article_category_id' => '',
            'article_content' => '',
        ];
    }

    public function attributes() {
        return [


        ];
    }
}
