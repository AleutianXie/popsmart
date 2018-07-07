@extends('adminlte::page')

@section('content_header')
    <h1>案例列表</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb" style="padding: 0px;margin: 0px;">
            <li>
              <a>角色-用户列表</a>
                        </li>
                        <a href="{{ route('admin.cases.create') }}">
                            <button class="btn-add btn btn-success btn-sm pull-right">
                                +新增
                            </button>
                        </a>
                    </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th>角色ID</th>
                <th>角色名</th>
                <th>描述</th>
                <th>用户</th>
                <th>权限</th>
                <th>创建时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cases as $case)
              <tr>
                <td>{{ $case->id }}</td>
                <td><img src="{{ $case->cover }}" alt=""></td>
                <td>{{ $case->name }}</td>
                <td>{{ $case->summary}}</td>
                <td>{{ $case->sort }}</td>
                <td>{{ $case->is_top }}</td>
                <td>
                  <a href="{{-- {{ route('backend.role.edit', $role->id) }} --}}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $cases->links() }}
        </div>
      </div>
    </div>
  </div>
@stop