<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /////////////////admin/////////////////////
    /**
     * admin list
     */
    public function adminIndex(Request $request)
    {
        $filter       = $request->input();
        $class_name   = substr(class_basename(static::class), 0, -10);
        $model        = 'App\\'.$class_name;
        $class_names  = str_plural(strtolower($class_name));
        $model        = $model::query();
        $this->getModel($model);
        $$class_names = $model->paginate()->appends($filter);
        return view('admin.'.strtolower($class_name).'.index', compact('filter', $class_names));
    }

    public function detail(Request $request, $id)
    {
        $class_name  = substr(class_basename(static::class), 0, -10);
        $model       = 'App\\'.$class_name;
        $class_name  = strtolower($class_name);
        $$class_name = $model::query()->findOrFail($id);

        return view($class_name.'.detail', compact($class_name));
    }

    public function delete(Request $request, $id)
    {
        $class_name  = substr(class_basename(static::class), 0, -10);
        $model       = 'App\\'.$class_name;
        $class_name  = strtolower($class_name);
        $$class_name = $model::query()->findOrFail($id);
        if ('article' == $class_name) {
            $attribute = $$class_name->attribute_id;
        }
        $$class_name->delete();

        if ('article' == $class_name) {
            return redirect(route('admin.'.strtolower($class_name).'.index', $attribute))->with('succeed', '删除成功!');
        }
        return redirect(route('admin.'.strtolower($class_name).'.index'))->with('succeed', '删除成功!');
    }

    /**
     * 查询构造器
     */
    protected function getModel(&$model)
    {
        $model->orderByDesc('is_top');
        $model->orderByDesc('sort');
        $model->latest();
    }
}
