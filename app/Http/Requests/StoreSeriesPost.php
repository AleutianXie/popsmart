<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreSeriesPost extends FormRequest
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

        if (Route::currentRouteName() == 'admin.series.create') {
            return [
                'name'      => 'required|unique:series,name,,,deleted_at,NULL',
                'icon'      => 'image',
                'overview'  => 'max:255',
                'sort'      => 'required|integer|min:0',
                'is_top'    => 'required|boolean',
                'is_url'  => 'max:255'
            ];
        }

        if (Route::currentRouteName() == 'admin.series.edit') {
            $id = $this->route('id');
            return [
                'name'     => 'required|unique:series,name,' . $id . ',id,deleted_at,NULL',
                'icon'     => 'image',
                'overview' => 'max:255',
                'sort'     => 'required|integer|min:0',
                'is_top'   => 'required|boolean',
                'is_url'  => 'max:255'
            ];
        }
    }

    public function attributes()
    {
        return [
           'name'        => '系列名',
           'icon'        => '图标',
           'sort'        => '排序',
           'is_top'      => '是否置顶',
           'is_url'      => '是否是链接'
        ];
    }
}
