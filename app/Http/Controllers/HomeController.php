<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cases;
use App\Module;
use App\News;
use App\Product;
use App\Series;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerModel = new Banner();
        $bannerModel->getModel($bannerModel);
        $banners = $bannerModel->limit(5)->get();

        $newModel = new News();
        $newModel->getModel($newModel);
        $news     = $newModel->first();

        $seriesModel = new Series();
        $seriesModel->getModel($seriesModel);
        $series      = $seriesModel->limit(4)->get();

        $products = [];
        foreach ($series as $item) {
            $productModel        = new Product();
            $productModel->getModel($productModel);
            $products[$item->id] = $productModel->Series($item->id)->limit(8)->get();
        }

        $caseModel = new Cases();
        $caseModel->getModel($caseModel);
        $cases     = $caseModel->limit(4)->get();

        $moduleModel = new Module();
        $moduleModel->getModel($moduleModel);
        $modules     = $moduleModel->limit(4)->get();
        return view('index', compact('banners', 'news', 'series', 'products', 'cases', 'modules'));
    }
}
