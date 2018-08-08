<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreJobPost;
use App\Job;
use App\Tag;
use DB;

class JobController extends Controller
{
    public function create(StoreJobPost $request)
    {
        if ($request->isMethod('POST')) {
            try {
                DB::beginTransaction();
                $jobAttribute = $request->input();
                array_forget($jobAttribute, '_token');
                $tags = $jobAttribute["tag_id"];
                array_forget($jobAttribute, 'tag_id');
                $job = Job::create($jobAttribute);
                $job->assignTags($tags);
                DB::commit();
                return redirect(route('admin.job.index'))->with('success', '创建成功！');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back();
            }
        }
        $departments = Department::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        return view('admin.job.create', compact('departments', 'tags'));
    }

    public function edit(StoreJobPost $request, $id)
    {
        $job = Job::findOrFail($id);
        if ($request->isMethod('POST')) {
            try {
                DB::beginTransaction();
                $jobAttribute = $request->input();
                array_forget($jobAttribute, '_token');
                $tags = $jobAttribute["tag_id"];
                array_forget($jobAttribute, 'tag_id');
                $job->update($jobAttribute);
                $job->assignTags($tags);
                DB::commit();
                return redirect(route('admin.job.index'))->with('success', '修改成功！');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back();
            }
        }
        $departments = Department::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        return view('admin.job.edit', compact('job', 'departments', 'tags'));
    }
}
