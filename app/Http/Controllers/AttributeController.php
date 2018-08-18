<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Http\Requests\StoreAttributePost;

class AttributeController extends Controller
{
    public function create(StoreAttributePost $request)
    {
        if ($request->isMethod('POST')) {
            $attributeAttribute = $request->input();
            array_forget($attributeAttribute, '_token');
            Attribute::create($attributeAttribute);
            return redirect(route('admin.attribute.index'))->with('success', '创建成功！');
        }
        return view('admin.attribute.create');
    }

    public function edit(StoreAttributePost $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        if ($request->isMethod('POST')) {
            $attributeAttribute = $request->input();
            array_forget($attributeAttribute, '_token');
            $attribute->update($attributeAttribute);
            return redirect(route('admin.attribute.index'))->with('success', '修改成功！');
        }
        return view('admin.attribute.edit', compact('attribute'));
    }

    /**
     * 查询构造器
     */
    protected function getModel(&$model)
    {
        // $model->orderByDesc('is_top');
        // $model->orderByDesc('sort');
        $model->latest();
    }
}
