@extends('adminlte::page')

@section('content_header')
    <h1>文章列表</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb" style="padding: 0px;margin: 0px;">
              <a>文章列表</a>
              <a href="{{ route('admin.article.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>标题</th>
                <th>简述</th>
                <th>属性</th>
                <th>启用</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($articles as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->summary }}</td>
                <td>{{ $item->attribute->name }}</td>
                <td>{{ $item->enabled == 1 ? '是' : '否' }}</td>
                <td>
                  <a href="{{ route('admin.article.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $articles->links() }}
        </div>
      </div>
    </div>
  </div>
@stop