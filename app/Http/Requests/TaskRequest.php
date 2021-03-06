<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|string|between:3,200',
            'user_id' => 'nullable|integer|exists:users,id',
            'cat_id' => 'required|integer|exists:cats,id',
            'description' => 'required|string|min:10',
        ];
    }
}
