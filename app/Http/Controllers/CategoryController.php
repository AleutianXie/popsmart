<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryPost;
use App\Library\Utils\Uploader;

class CategoryController extends Controller
{
    public function create(StoreCategoryPost $request)
    {
        if ($request->isMethod('POST')) {
            $icon = Uploader::uploadImage($request->file('icon'));
            $cateAttribute = $request->input();
            array_forget($cateAttribute, '_token');
            $cateAttribute = array_add($cateAttribute, 'icon', $icon);
            Category::create($cateAttribute);
            return redirect(route('admin.category.index'))->with('success', '创建成功！');
        }

        return view('admin.category.create');
    }

    public function edit(StoreCategoryPost $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->isMethod('POST')) {
            $cateAttribute = $request->input();
            // dd($cateAttribute);
            array_forget($cateAttribute, '_token');
            if ($request->hasFile('icon')) {
                $icon = Uploader::uploadImage($request->file('icon'));
                $cateAttribute = array_add($cateAttribute, 'icon', $icon);
            }
            $category->update($cateAttribute);
            return redirect(route('admin.category.index'))->with('success', '修改成功！');
        }
        return view('admin.category.edit', compact('category'));
    }
}
