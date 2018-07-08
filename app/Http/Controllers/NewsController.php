<?php

namespace App\Http\Controllers;

use App\Library\Utils\Uploader;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->input();
        $model = new News();
        $model = $model->query();
        $this->_getModel($model, $filter);
        $news = $model->paginate()->appends($filter);
        return view('news.index', compact('news'));
    }


    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cover = Uploader::uploadImage($request->file('cover'));
            $newsAttribute = $request->input();
            array_forget($newsAttribute, '_token');
            $newsAttribute = array_add($newsAttribute, 'cover', $cover);
            News::create($newsAttribute);
            return redirect(route('admin.news.index'))->with('success', '创建成功！');
        }
        return view('admin.news.create');
    }

    /**
     * 案例查询构造器
     */
    private function _getModel(&$model, $data)
    {
        // if (isset($data['publish_state']) && $data['publish_state'] != '') {
        //     $model->PublishState($data['publish_state']);
        // }

        // $model->with([
        //     'couponExtends' => function ($query) {
        //         $query->select(['coupon_id', 'property_name', 'property_value']);
        //     }
        // ]);

        $model->latest();
    }
}
