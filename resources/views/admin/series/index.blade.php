@extends('adminlte::page')

@section('content_header')
    <h1>产品系列列表</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb" style="padding: 0px;margin: 0px;">
              <a>产品系列列表</a>
              <a href="{{ route('admin.series.create') }}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> 新增
              </a>
          </ol>
        </div>
        <div class="panel-body">
          <table class="user-table table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>图标</th>
                <th>系列名</th>
                <th>简述</th>
                <th>排序</th>
                <th>置顶</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($series as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>@if ($item->icon)<img src="{{ $item->icon }}" style="max-width: 100%;" alt="{{ $item->name }}">@endif</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->overview }}</td>
                <td>{{ $item->sort }}</td>
                <td>{{ $item->is_top == 1 ? '是' : '否' }}</td>
                <td>
                  <a href="{{ route('admin.series.edit', $item->id) }}">
                    <button class="btn btn-primary btn-xs">
                      修改
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $series->links() }}
        </div>
      </div>
    </div>
  </div>
@stop