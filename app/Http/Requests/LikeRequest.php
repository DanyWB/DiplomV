<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LikeRequest extends FormRequest
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
            'likeable_id' => 'required',
            'likeable_type' => 'required',
        ];
    }



    public function checkLikeable() {


        $likeabales = config('likeable');

        if(!isset($likeabales[$this->likeable_type])) {

            throw ValidationException::withMessages([
            'likeable_type' => trans('auth.failed'),
             ]);

        }


        $model = $likeabales[$this->likeable_type]::findOrFail($this->likeable_id);

        return $model;


    }
}
