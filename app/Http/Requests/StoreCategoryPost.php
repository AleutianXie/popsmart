<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryPost extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'name'   => 'required|unique:categories',
                'icon'   => 'required|image',
                'sort'   => 'required|integer|min:0',
                'is_top' => 'required|boolean'
            ];
        }
        return [];
    }
}
