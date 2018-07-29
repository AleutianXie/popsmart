<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreArticlePost extends FormRequest
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

        if (Route::currentRouteName() == 'admin.article.create') {
            return [
                'name'    => 'required|unique:articles,name,,,deleted_at,NULL',
                'summary' => 'max:255',
                'content' => 'required',
                'enabled' => 'boolean',
            ];
        }

        if (Route::currentRouteName() == 'admin.article.edit') {
            $id = $this->route('id');
            return [
                'name'    => 'required|unique:articles,name,' . $id . ',id,deleted_at,NULL',
                'summary' => 'max:255',
                'content' => 'required',
                'enabled' => 'boolean',
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'    => '属性名',
           'summary' => '备注',
           'content' => '内容',
           'enabled' => '启用',
        ];
    }
}
