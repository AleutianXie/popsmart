<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreNewsPost extends FormRequest
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
        if (Route::currentRouteName() == 'admin.news.create') {
            return [
                'name'        => 'required|unique:news,name,,,deleted_at,NULL',
                'summary'     => 'required',
                'cover'       => 'required|image',
                'content'     => 'required',
                'sort'        => 'required|integer|min:0',
                'is_top'      => 'required|boolean',
            ];
        }

        if (Route::currentRouteName() == 'admin.news.edit') {
            $id = $this->route('id');
            return [
                'name'        => 'required|unique:news,name,' . $id . ',id,deleted_at,NULL',
                'summary'     => 'required',
                'cover'       => 'image',
                'content'     => 'required',
                'sort'        => 'required|integer|min:0',
                'is_top'      => 'required|boolean',
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'        => '标题',
           'summary'     => '摘要',
           'cover'       => '封图',
           'content'     => '内容',
           'sort'        => '排序',
           'is_top'      => '是否置顶',
        ];
    }
}
