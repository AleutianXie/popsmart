<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagPost;
use App\Tag;

class TagController extends Controller
{
    public function create(StoreTagPost $request)
    {
        if ($request->isMethod('POST')) {
            $tagAttribute = $request->input();
            array_forget($tagAttribute, '_token');
            Tag::create($tagAttribute);
            return redirect(route('admin.tag.index'))->with('success', '创建成功！');
        }

        return view('admin.tag.create');
    }

    public function edit(StoreTagPost $request, $id)
    {
        $tag = Tag::findOrFail($id);
        if ($request->isMethod('POST')) {
            $tagAttribute = $request->input();
            array_forget($tagAttribute, '_token');
            $tag->update($tagAttribute);
            return redirect(route('admin.tag.index'))->with('success', '修改成功！');
        }
        return view('admin.tag.edit', compact('tag'));
    }
}
