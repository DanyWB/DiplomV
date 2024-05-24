<?php

namespace App\Http\Requests\Article;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
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
            'title' => ['required','string','min:5','max:30'],
            'content' => 'required|string|min:10|max:4000',
            'imageable_type' => 'required',
        ];
    }

    public function checkImageable() {

        $commentabales = config('imageable');

        if(!isset($commentabales[$this->imageable_type])) {
            throw ValidationException::withMessages([
            'imageable_type' => trans('auth.failed'),
             ]);

        }


    }


}
