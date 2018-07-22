<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreModulePost extends FormRequest
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

        if (Route::currentRouteName() == 'admin.module.create') {
            return [
                'name'     => 'required|unique:modules,name,,,deleted_at,NULL',
                'icon'     => 'image',
                'overview' => 'max:255',
                'sort'     => 'required|integer|min:0',
                'is_top'   => 'required|boolean'
            ];
        }

        if (Route::currentRouteName() == 'admin.module.edit') {
            $id = $this->route('id');
            return [
                'name'     => 'required|unique:modules,name,' . $id . ',id,deleted_at,NULL',
                'icon'     => 'image',
                'overview' => 'max:255',
                'sort'     => 'required|integer|min:0',
                'is_top'   => 'required|boolean'
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'        => '模块名',
           'icon'        => '图标',
           'overview'    => '简述',
           'sort'        => '排序',
           'is_top'      => '是否置顶',
        ];
    }
}
