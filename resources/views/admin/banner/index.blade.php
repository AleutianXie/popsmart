@extends('adminlte::page')

@section('content_header')
    <h1>轮播图</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb" style="padding: 0px;margin: 0px;">
              <a>轮播图列表</a>
              <a href="{{ route('admin.banner.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-2">图片</th>
                <th class="col-md-2">移动端图片</th>
                <th class="col-md-1">标题</th>
                <th class="col-md-2">简述</th>
                <th class="col-md-2">链接</th>
                <th class="col-md-1">排序</th>
                <th class="col-md-1">置顶</th>
                <th class="col-md-1">创建时间</th>
                <th class="col-md-1">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($banners as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td><img src="{{ $item->pic }}" style="max-width: 100%;" alt="{{ $item->name }}"></td>
                <td><img src="{{ $item->m_url }}" style="max-width: 150px;" alt="{{ $item->name }}"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->summary }}</td>
                <td>{{ $item->link }}</td>
                <td>{{ $item->sort }}</td>
                <td>{{ $item->is_top == 1 ? '是' : '否' }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <a href="{{ route('admin.banner.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                  <a class="btn btn-danger btn-xs" data-type="banner" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-delete">删除</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $banners->links() }}
        </div>
      </div>
    </div>
  </div>
@stop