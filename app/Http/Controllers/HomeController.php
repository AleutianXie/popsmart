<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cases;
use App\Module;
use App\News;
use App\Product;
use App\Series;
use App\Service;
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
        $banners = $bannerModel->orderByDesc('is_top')->orderByDesc('sort')->latest()->limit(5)->get();
        $newModel = new News();
        $news     = $newModel->orderByDesc('is_top')->orderByDesc('sort')->latest()->first();

        $seriesModel = new Series();
        $series      = $seriesModel->limit(4)->orderByDesc('is_top')->orderByDesc('sort')->latest()->get();

        $products = [];
        foreach ($series as $item) {
            $productModel        = new Product();
            $products[$item->id] = $productModel->Series($item->id)->orderByDesc('is_top')->orderByDesc('sort')->latest()->limit(8)->get();
        }

        $caseModel = new Cases();
        $caseModel->getModel($caseModel);
        $cases     = $caseModel->limit(4)->get();

        $moduleModel = new Module();
        $moduleModel->getModel($moduleModel);
        $modules     = $moduleModel->limit(8)->get();

        $services = [];
        $serviceModel    = new Service();
        foreach ($modules as $module) {
            $services[$module->id] = $serviceModel->industry($module->id)->orderByDesc('is_top')->orderByDesc('sort')->latest()->limit(10)->get();
        }

        return view('index', compact('banners', 'news', 'series', 'products', 'cases', 'modules', 'services'));
    }
}
