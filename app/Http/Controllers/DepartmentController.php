<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreDepartmentPost;

class DepartmentController extends Controller
{
    public function create(StoreDepartmentPost $request)
    {
        if ($request->isMethod('POST')) {
            $departmentAttribute = $request->input();
            array_forget($departmentAttribute, '_token');
            Department::create($departmentAttribute);
            return redirect(route('admin.department.index'))->with('success', '创建成功！');
        }

        return view('admin.department.create');
    }

    public function edit(StoreDepartmentPost $request, $id)
    {
        $department = Department::findOrFail($id);
        if ($request->isMethod('POST')) {
            $departmentAttribute = $request->input();
            array_forget($departmentAttribute, '_token');
            $department->update($departmentAttribute);
            return redirect(route('admin.department.index'))->with('success', '修改成功！');
        }
        return view('admin.department.edit', compact('department'));
    }
}
