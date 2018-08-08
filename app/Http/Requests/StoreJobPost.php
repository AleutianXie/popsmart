<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreJobPost extends FormRequest
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
        if (Route::currentRouteName() == 'admin.job.create') {
            return [
                'department_id' => 'required|exists:departments,id,deleted_at,NULL',
                'name'    => 'required|unique:jobs,name,,,deleted_at,NULL',
                'comment' => 'max:255',
                'duty'    => 'required',
                'requirements' => 'required',
                'sort'    => 'required|integer|min:0',
                'is_top'  => 'required|boolean',
                'tag_id'   => 'required|array',
                'tag_id.*' => 'required|integer|min:1|unique:tags,id,,,deleted_at, 0|distinct'
            ];
        }

        if (Route::currentRouteName() == 'admin.job.edit') {
            $id = $this->route('id');
            return [
                'department_id' => 'required|exists:departments,id,deleted_at,NULL',
                'name'    => 'required|unique:jobs,name,' . $id . ',id,deleted_at,NULL',
                'comment' => 'max:255',
                'duty'    => 'required',
                'requirements' => 'required',
                'sort'    => 'required|integer|min:0',
                'is_top'  => 'required|boolean',
                'tag_id'   => 'required|array',
                'tag_id.*' => 'required|integer|min:1|unique:tags,id,,,deleted_at, 0|distinct'
            ];
        }
    }

    public function attributes()
    {
        return [
           'department_id' => '部门',
           'name'           => '职位名称',
           'comment'        => '备注',
           'duty'           => '工作职责',
           'requirements'   => '任职要求',
           'sort'           => '排序',
           'is_top'         => '是否置顶',
           'tag_id'         => '标签',
        ];
    }
}
