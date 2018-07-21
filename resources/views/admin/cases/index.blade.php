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
              <a>案例列表</a>
              <a href="{{ route('admin.cases.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>案例名</th>
                <th>封图</th>
                <th>简述</th>
                <th>排序</th>
                <th>是否置顶</th>
                <th>创建时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cases as $case)
              <tr>
                <td>{{ $case->id }}</td>
                <td>{{ $case->name }}</td>
                <td><img src="{{ $case->cover }}" alt="{{ $case->name }}"></td>
                <td>{{ $case->summary}}</td>
                <td>{{ $case->sort }}</td>
                <td>{{ $case->is_top }}</td>
                <td>{{ $case->created_at }}</td>
                <td>
                  <a href="{{ route('admin.cases.edit', $case->id) }}">
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