<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicePost;
use App\Library\Utils\Uploader;
use App\Module;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreServicePost $request)
    {
        $modules  = Module::all()->toArray();
        $cur      = $request->input('module');
        if (empty($cur)) {
            $cur  = array_first($modules)['id'];
        }
        $modules  = json_encode($modules);
        $model    = new Service();
        $services = $model->Module($cur)->paginate();

        return view('service.index', compact('modules', 'cur', 'services'));
    }

    public function create(StoreServicePost $request)
    {
        if ($request->isMethod('POST')) {
            $serviceAttribute = $request->input();
            if ($request->hasFile('cover')) {
                $cover            = Uploader::uploadImage($request->file('cover'));
                $serviceAttribute = array_add($serviceAttribute, 'cover', $cover);
            }
            array_forget($serviceAttribute, '_token');
            Service::create($serviceAttribute);
            return redirect(route('admin.service.index'))->with('success', '创建成功！');
        }
        $modules              = Module::all()->pluck('name', 'id')->toArray();
        return view('admin.service.create', compact('modules'));
    }

    public function edit(StoreServicePost $request, $id)
    {
        $service                  = Service::findOrFail($id);
        if ($request->isMethod('POST')) {
            $serviceAttribute     = $request->input();
            array_forget($serviceAttribute, '_token');
            if ($request->hasFile('cover')) {
                $cover            = Uploader::uploadImage($request->file('cover'));
                $serviceAttribute = array_add($serviceAttribute, 'cover', $cover);
            }
            $service->update($serviceAttribute);
            return redirect(route('admin.service.index'))->with('success', '修改成功！');
        }
        $modules                 = Module::all()->pluck('name', 'id')->toArray();
        return view('admin.service.edit', compact('service', 'modules'));
    }
}
