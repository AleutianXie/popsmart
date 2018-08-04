<?php

namespace App\Http\Controllers;

use App\Article;
use App\Attribute;
use App\Http\Requests\StoreArticlePost;

class ArticleController extends Controller
{

    /**
     * admin list
     */
    public function admin(StoreArticlePost $request, $attribute_id = 0)
    {
        $filter = $request->input();
        if ($attribute_id) {
            $articles = Article::where(compact('attribute_id'))->paginate()->appends($filter);
        } else {
            $articles = Article::paginate()->appends($filter);
        }

        return view('admin.article.index', compact('filter', 'articles'));
    }

    public function create(StoreArticlePost $request)
    {
        if ($request->isMethod('POST')) {
            $articleAttribute = $request->input();
            array_forget($articleAttribute, '_token');
            if ($articleAttribute['enabled'] == 1) {
                $article = Article::where('enabled', 1)->where('attribute_id', $articleAttribute['attribute_id'])->first();
                if ($article) {
                    $article->update(['enabled' => 0]);
                }
            }
            Article::create($articleAttribute);
            return redirect(route('admin.article.index'))->with('success', '创建成功！');
        }
        $attributes = Attribute::all()->pluck('name', 'id')->toArray();
        return view('admin.article.create', compact('attributes'));
    }

    public function edit(StoreArticlePost $request, $id)
    {
        $article = Article::findOrFail($id);

        if ($request->isMethod('POST')) {
            $articleAttribute = $request->input();
            array_forget($articleAttribute, '_token');
            if ($articleAttribute['enabled'] == 1 && $article->enabled == 0) {
                $temp_article = Article::where('enabled', 1)->where('attribute_id', $articleAttribute['attribute_id'])->first();
                if ($temp_article) {
                    $temp_article->update(['enabled' => 0]);
                }
            }
            $article->update($articleAttribute);
            return redirect(route('admin.article.index', $article->attribute_id))->with('success', '修改成功！');
        }
        $attributes = Attribute::all()->pluck('name', 'id')->toArray();
        return view('admin.article.edit', compact('article', 'attributes'));
    }
}
