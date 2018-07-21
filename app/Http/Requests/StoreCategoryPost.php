<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

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
        if ($this->isMethod('GET')) {
            return [];
        }

        if (Route::currentRouteName() == 'admin.category.create') {
            return [
                'name'   => 'required|unique:categories,name,,,deleted_at,NULL',
                'icon'   => 'required|image',
                'sort'   => 'required|integer|min:0',
                'is_top' => 'required|boolean'
            ];
        }

        if (Route::currentRouteName() == 'admin.category.edit') {
            $id = $this->route('id');
            return [
                'name'   => 'required|unique:categories,name,' . $id . ',id,deleted_at,NULL',
                'icon'   => 'image',
                'sort'   => 'required|integer|min:0',
                'is_top' => 'required|boolean'
            ];
        }
    }
}
