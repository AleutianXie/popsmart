<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\StoreBannerPost;
use App\Library\Utils\Uploader;

class BannerController extends Controller
{
    public function create(StoreBannerPost $request)
    {
        if ($request->isMethod('POST')) {
            $pic         = Uploader::uploadImage($request->file('pic'));
            $bannerAttribute = $request->input();
            array_forget($bannerAttribute, '_token');
            $bannerAttribute = array_add($bannerAttribute, 'pic', $pic);
            Banner::create($bannerAttribute);
            return redirect(route('admin.banner.index'))->with('success', '创建成功！');
        }
        return view('admin.banner.create');
    }

    public function edit(StoreBannerPost $request, $id)
    {
        $banner                  = Banner::findOrFail($id);

        if ($request->isMethod('POST')) {
            $bannerAttribute     = $request->input();
            array_forget($bannerAttribute, '_token');
            if ($request->hasFile('pic')) {
                $pic         = Uploader::uploadImage($request->file('pic'));
                $bannerAttribute = array_add($bannerAttribute, 'pic', $pic);
            }
            $banner->update($bannerAttribute);
            return redirect(route('admin.banner.index'))->with('success', '修改成功！');
        }
        return view('admin.banner.edit', compact('banner'));
    }
}
