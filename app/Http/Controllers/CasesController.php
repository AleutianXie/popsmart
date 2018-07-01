<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Category;
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
        return view('case.index', compact('categories', 'cur', 'cases'));
    }
}
