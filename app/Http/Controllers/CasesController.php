<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Category;
use App\Library\Utils\Uploader;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all()->toArray();
        $cur = $request->input('cate');
        if (empty($cur)) {
            $cur = array_first($categories)['id'];
        }
        $categories = json_encode(Category::all()->toArray());

        $cases = json_encode(Cases::Category($cur)->get()->toArray());
        return view('cases.index', compact('categories', 'cur', 'cases'));
    }


    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cover = Uploader::uploadImage($request->file('cover'));
            $caseAttribute = $request->input();
            array_forget($caseAttribute, '_token');
            $caseAttribute = array_add($caseAttribute, 'cover', $cover);
            Cases::create($caseAttribute);
            return redirect(route('admin.cases.index'))->with('success', '创建成功！');
        }
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('admin.cases.create', compact('categories'));
    }
}
