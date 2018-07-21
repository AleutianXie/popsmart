<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeriesPost;
use App\Library\Utils\Uploader;
use App\Series;

class SeriesController extends Controller
{
    public function create(StoreSeriesPost $request)
    {
        if ($request->isMethod('POST')) {
            $seriesAttribute = $request->input();
            array_forget($seriesAttribute, '_token');
            if ($request->hasFile('icon')) {
                $icon = Uploader::uploadImage($request->file('icon'));
                $seriesAttribute = array_add($seriesAttribute, 'icon', $icon);
            }
            Series::create($seriesAttribute);
            return redirect(route('admin.series.index'))->with('success', '创建成功！');
        }
        return view('admin.series.create');
    }

    public function edit(StoreSeriesPost $request, $id)
    {
        $series = Series::findOrFail($id);
        if ($request->isMethod('POST')) {
            $seriesAttribute = $request->input();
            array_forget($seriesAttribute, '_token');
            if ($request->hasFile('icon')) {
                $icon = Uploader::uploadImage($request->file('icon'));
                $seriesAttribute = array_add($seriesAttribute, 'icon', $icon);
            }
            $series->update($seriesAttribute);
            return redirect(route('admin.series.index'))->with('success', '修改成功！');
        }
        return view('admin.series.edit', compact('series'));
    }
}
