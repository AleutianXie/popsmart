@extends('adminlte::page')

@section('content_header')
    <h1>服务模块列表</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb" style="padding: 0px;margin: 0px;">
              <a>服务模块列表</a>
              <a href="{{ route('admin.module.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-2">图标</th>
                <th class="col-md-1">模块名</th>
                <th class="col-md-4">简述</th>
                <th class="col-md-1">排序</th>
                <th class="col-md-1">置顶</th>
                <th class="col-md-2">创建时间</th>
                <th class="col-md-1">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($modules as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td><img src="{{ $item->icon }}" style="max-width: 100%;" alt="{{ $item->name }}"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->overview }}</td>
                <td>{{ $item->sort }}</td>
                <td>{{ $item->is_top == 1 ? '是' : '否' }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <a href="{{ route('admin.module.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $modules->links() }}
        </div>
      </div>
    </div>
  </div>
@stop