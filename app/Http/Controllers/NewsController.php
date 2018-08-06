<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsPost;
use App\Library\Utils\Uploader;
use App\News;

class NewsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreNewsPost $request)
    {
        $filter = $request->input();
        $model  = new News();
        $model  = $model->query();
        $this->getModel($model);
        $news   = $model->paginate()->appends($filter);
        return view('news.index', compact('news'));
    }


    public function create(StoreNewsPost $request)
    {
        if ($request->isMethod('POST')) {
            $cover         = Uploader::uploadImage($request->file('cover'));
            $newsAttribute = $request->input();
            array_forget($newsAttribute, '_token');
            $newsAttribute = array_add($newsAttribute, 'cover', $cover);
            News::create($newsAttribute);
            return redirect(route('admin.news.index'))->with('success', '创建成功！');
        }
        return view('admin.news.create');
    }

    public function edit(StoreNewsPost $request, $id)
    {
        $news = News::findOrFail($id);

        if ($request->isMethod('POST')) {
            $newsAttribute     = $request->input();
            array_forget($newsAttribute, '_token');
            if ($request->hasFile('cover')) {
                $cover         = Uploader::uploadImage($request->file('cover'));
                $newsAttribute = array_add($newsAttribute, 'cover', $cover);
            }
            $news->update($newsAttribute);
            return redirect(route('admin.news.index'))->with('success', '修改成功！');
        }
        return view('admin.news.edit', compact('news'));
    }
}
