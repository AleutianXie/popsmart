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
            return redirect(route('admin.cases.index'))->with('success', '创建成功！');
        }

        return view('admin.category.create');
    }
}
