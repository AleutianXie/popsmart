<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobPost;

class JobController extends Controller
{
    public function create(StoreJobPost $request)
    {
        if ($request->isMethod('POST')) {
            $jobAttribute = $request->input();
            array_forget($jobAttribute, '_token');
            Tag::create($jobAttribute);
            return redirect(route('admin.job.index'))->with('success', '创建成功！');
        }
        return view('admin.job.create');
    }

    public function edit(StoreJobPost $request, $id)
    {
        $job = Job::findOrFail($id);
        if ($request->isMethod('POST')) {
            $jobAttribute = $request->input();
            array_forget($jobAttribute, '_token');
            $job->update($jobAttribute);
            return redirect(route('admin.job.index'))->with('success', '修改成功！');
        }
        return view('admin.job.edit', compact('job'));
    }
}
