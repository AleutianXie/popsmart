<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreBannerPost extends FormRequest
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
        if (Route::currentRouteName() == 'admin.banner.create') {
            return [
                // 'name'        => 'required|unique:banners,name,,,deleted_at,NULL',
                // 'summary'     => 'required',
                'pic'         => 'required|image',
                'link'        => 'required|url',
                'sort'        => 'required|integer|min:0',
                'is_top'      => 'required|boolean',
            ];
        }

        if (Route::currentRouteName() == 'admin.banner.edit') {
            $id = $this->route('id');
            return [
                // 'name'        => 'required|unique:banners,name,' . $id . ',id,deleted_at,NULL',
                // 'summary'     => 'required',
                'pic'         => 'image',
                'link'        => 'required|url',
                'sort'        => 'required|integer|min:0',
                'is_top'      => 'required|boolean',
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'        => '标题',
           'summary'     => '简述',
           'pic'         => '图片',
           'link'        => '链接',
           'sort'        => '排序',
           'is_top'      => '是否置顶',
        ];
    }
}
