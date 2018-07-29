<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreAttributePost extends FormRequest
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

        if (Route::currentRouteName() == 'admin.attribute.create') {
            return [
                'name'    => 'required|unique:attributes,name,,,deleted_at,NULL',
                'comment' => 'max:255'
            ];
        }

        if (Route::currentRouteName() == 'admin.attribute.edit') {
            $id = $this->route('id');
            return [
                'name'    => 'required|unique:attributes,name,' . $id . ',id,deleted_at,NULL',
                'comment' => 'max:255'
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'    => '属性名',
           'comment' => '备注',
        ];
    }
}
