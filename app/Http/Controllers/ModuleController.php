<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModulePost;
use App\Library\Utils\Uploader;
use App\Module;

class ModuleController extends Controller
{
    public function create(StoreModulePost $request)
    {
        if ($request->isMethod('POST')) {
            $icon = '';
            if ($request->hasFile('icon')) {
                $icon            = Uploader::uploadImage($request->file('icon'));
            }
            $moduleAttribute = $request->input();
            array_forget($moduleAttribute, '_token');
            $moduleAttribute = array_add($moduleAttribute, 'icon', $icon);
            Module::create($moduleAttribute);
            return redirect(route('admin.module.index'))->with('success', '创建成功！');
        }
        return view('admin.module.create');
    }

    public function edit(StoreModulePost $request, $id)
    {
        $module = Module::findOrFail($id);

        if ($request->isMethod('POST')) {
            $moduleAttribute     = $request->input();
            array_forget($moduleAttribute, '_token');
            if ($request->hasFile('icon')) {
                $icon            = Uploader::uploadImage($request->file('icon'));
                $moduleAttribute = array_add($moduleAttribute, 'icon', $icon);
            }
            $module->update($moduleAttribute);
            return redirect(route('admin.module.index'))->with('success', '修改成功！');
        }
        return view('admin.module.edit', compact('module'));
    }
}
