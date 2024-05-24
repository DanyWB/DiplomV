<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CommentRequest extends FormRequest
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
            'content' => ['required','string','min:5','max:200'],
            'commentable_id' => '',
            'commentable_type' => '',
        ];
    }

    public function attributes() {
        return [
            'content' => 'Комментарий',
        ];
    }

    public function checkCommentable() {

        $commentabales = config('commentable');

        if(!isset($commentabales[$this->commentable_type])) {

            throw ValidationException::withMessages([
            'commentable_type' => trans('auth.failed'),
             ]);

        }



        $model = $commentabales[$this->commentable_type]::findOrFail($this->commentable_id);

        return $model;


    }
}
