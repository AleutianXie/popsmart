<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type = 'index')
    {
        if ('join' == $type) {
            return view('recruit.index');
        } elseif ('index' == $type) {
            $article = Article::where('enabled', 1)->Attribute('关于我们')->latest()->first();
            if (empty($article)) {
                $article = Article::latest()->Attribute('关于我们')->first();
            }
            return view('about.index', compact('article'));
        } else {
            $article = Article::where('enabled', 1)->Attribute('联系我们')->latest()->first();
            if (empty($article)) {
                $article = Article::latest()->Attribute('联系我们')->first();
            }
            return view('contact.index', compact('article'));
        }

    }
}
