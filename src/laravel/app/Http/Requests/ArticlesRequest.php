<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
            'title' => 'required|unique:users|max:255',
            'body' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'body.required' => '本文は入力必須です',
        ];
    }
}
