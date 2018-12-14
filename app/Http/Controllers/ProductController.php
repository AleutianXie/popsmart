<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPost;
use App\Library\Utils\Uploader;
use App\Product;
use App\Series;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreProductPost $request)
    {
        $filter   = $request->input();
        $model    = new Product();
        $this->getModel($model);
        $products = $model->paginate()->appends($filter);

        return view('product.index', compact('products'));
    }

    public function create(StoreProductPost $request)
    {
        if ($request->isMethod('POST')) {
            $cover            = Uploader::uploadImage($request->file('cover'));
            $productAttribute = $request->input();
            array_forget($productAttribute, '_token');
            $productAttribute = array_add($productAttribute, 'cover', $cover);
            Product::create($productAttribute);
            return redirect(route('admin.product.index'))->with('success', '创建成功！');
        }
        $series               = Series::all()->pluck('name', 'id')->toArray();
        return view('admin.product.create', compact('series'));
    }

    public function edit(StoreProductPost $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->isMethod('POST')) {
            $productAttribute     = $request->input();
            array_forget($productAttribute, '_token');
            if ($request->hasFile('cover')) {
                $cover            = Uploader::uploadImage($request->file('cover'));
                $productAttribute = array_add($productAttribute, 'cover', $cover);
            }
			if ($productAttribute['contentType'] == '0'){
				$productAttribute['is_url'] = '';
			} else {
				$productAttribute['content'] = '';
			}
            $product->update($productAttribute);
            return redirect(route('admin.product.index'))->with('success', '修改成功！');
        }
        $series                  = Series::all()->pluck('name', 'id')->toArray();
        return view('admin.product.edit', compact('product', 'series'));
    }
}
