<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Category;
use App\Http\Requests\StoreCasesPost;
use App\Library\Utils\Uploader;

class CasesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreCasesPost $request)
    {
        $categories = Category::all()->toArray();
        $cur        = $request->input('cate');
        if (empty($cur)) {
            $cur    = array_first($categories)['id'];
        }
        $categories = json_encode($categories);
        $model      = new Cases();
        $model      = $model->query();
        $this->getModel($model);
        $cases      = $model->Category($cur)->paginate();
        return view('cases.index', compact('categories', 'cur', 'cases'));
    }

    public function create(StoreCasesPost $request)
    {
        if ($request->isMethod('POST')) {
            $cover         = Uploader::uploadImage($request->file('cover'));
            $caseAttribute = $request->input();
            array_forget($caseAttribute, '_token');
            $caseAttribute = array_add($caseAttribute, 'cover', $cover);
            Cases::create($caseAttribute);
            return redirect(route('admin.cases.index'))->with('success', '创建成功！');
        }
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('admin.cases.create', compact('categories'));
    }

    public function edit(StoreCasesPost $request, $id)
    {
        $case                  = Cases::findOrFail($id);

        if ($request->isMethod('POST')) {
            $caseAttribute     = $request->input();
            array_forget($caseAttribute, '_token');
            if ($request->hasFile('cover')) {
                $cover         = Uploader::uploadImage($request->file('cover'));
                $caseAttribute = array_add($caseAttribute, 'cover', $cover);
            }
            $case->update($caseAttribute);
            return redirect(route('admin.cases.index'))->with('success', '修改成功！');
        }
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('admin.cases.edit', compact('case', 'categories'));
    }
}
