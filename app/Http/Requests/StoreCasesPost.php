<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreCasesPost extends FormRequest
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
        if (Route::currentRouteName() == 'admin.cases.create') {
            return [
                'name'        => 'required|unique:cases,name,,,deleted_at,NULL',
                'summary'     => 'required',
                'cover'       => 'required|image',
                'content'     => 'required',
                'sort'        => 'required|integer|min:0',
                'is_top'      => 'required|boolean',
                'category_id' => 'required|exists:categories,id,deleted_at,NULL'
            ];
        }

        if (Route::currentRouteName() == 'admin.cases.edit') {
            $id = $this->route('id');
            return [
                'name'        => 'required|unique:cases,name,' . $id . ',id,deleted_at,NULL',
                'summary'     => 'required',
                'cover'       => 'image',
                'content'     => 'required',
                'sort'        => 'required|integer|min:0',
                'is_top'      => 'required|boolean',
                'category_id' => 'required|exists:categories,id,deleted_at,NULL'
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'        => '案例名',
           'summary'     => '摘要',
           'cover'       => '封图',
           'content'     => '内容',
           'sort'        => '排序',
           'is_top'      => '是否置顶',
           'category_id' => '分类'
        ];
    }
}
