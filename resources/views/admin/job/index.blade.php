@extends('adminlte::page')

@section('content_header')
    <h1>职位标签列表</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb" style="padding: 0px;margin: 0px;">
              <a>职位标签列表</a>
              <a href="{{ route('admin.job.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>标签名</th>
                <th>备注</th>
                <th>排序</th>
                <th>置顶</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobs as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->comment }}</td>
                <td>{{ $item->sort }}</td>
                <td>{{ $item->is_top == 1 ? '是' : '否' }}</td>
                <td>
                  <a href="{{ route('admin.job.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $jobs->links() }}
        </div>
      </div>
    </div>
  </div>
@stop