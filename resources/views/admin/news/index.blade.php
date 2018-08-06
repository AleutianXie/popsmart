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
              <a href="{{ route('admin.news.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-1">标题</th>
                <th class="col-md-2">封图</th>
                <th class="col-md-2">简述</th>
                <th class="col-md-1">排序</th>
                <th class="col-md-1">置顶</th>
                <th class="col-md-2">创建时间</th>
                <th class="col-md-2">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($news as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="{{ $item->cover }}" style="width: 100%;" alt="{{ $item->name }}" style="width: 100%;"></td>
                <td>{{ $item->summary}}</td>
                <td>{{ $item->sort }}</td>
                <td>{{ $item->is_top == 1 ? '是' : '否' }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <a href="{{ route('admin.news.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $news->links() }}
        </div>
      </div>
    </div>
  </div>
@stop