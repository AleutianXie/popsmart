<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->input();
        $model = new Product();
        $model = $model->query();
        $this->_getModel($model, $filter);
        $products = $model->paginate()->appends($filter);

        return view('product.index', compact('products'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cover = Uploader::uploadImage($request->file('cover'));
            $newsAttribute = $request->input();
            array_forget($newsAttribute, '_token');
            $newsAttribute = array_add($newsAttribute, 'cover', $cover);
            Product::create($newsAttribute);
            return redirect(route('admin.product.index'))->with('success', '创建成功！');
        }
        return view('admin.product.create');
    }

    /**
     * 产品查询构造器
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
