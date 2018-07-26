<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreJobPost;
use App\Job;
use App\Tag;

class JobController extends Controller
{
    public function create(StoreJobPost $request)
    {
        if ($request->isMethod('POST')) {
            $jobAttribute = $request->input();
            array_forget($jobAttribute, '_token');
            Job::create($jobAttribute);
            return redirect(route('admin.job.index'))->with('success', '创建成功！');
        }
        $departments = Department::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        return view('admin.job.create', compact('departments', 'tags'));
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
        $departments = Department::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        return view('admin.job.edit', compact('job', 'departments', 'tags'));
    }
}
