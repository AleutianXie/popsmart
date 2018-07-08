@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('content_header')
    <h1>新建新闻</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.news.create'), 'files' => true ]) !!}
<div class="form-group">
    {{ Form::label('标题', null, ['class' => 'control-label']) }}
    {{ Form::text('name', '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('摘要', null, ['class' => 'control-label']) }}
    {{ Form::textArea('summary', '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('封图', null, ['class' => 'control-label']) }}
    {{ Form::file('cover') }}
</div>
<div class="form-group">
    {{ Form::label('内容', null, ['class' => 'control-label']) }}
@include('UEditor::head')
<div name="content" id="content" style="min-height: 600px;"></div>
</div>
<div class="form-group">
    {{ Form::label('排序', null, ['class' => 'control-label']) }}
    {{ Form::number('sort', 0, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('置顶', null, ['class' => 'control-label']) }}
    <div class="form-control">
        {{ Form::radio('is_top', 1) }}
        {{ Form::label('&nbsp;是&nbsp;', null, ['class' => 'text-success']) }}
        {{ Form::radio('is_top', 0, true) }}
        {{ Form::label('&nbsp;否&nbsp;', null, ['class' => 'text-muted']) }}
    </div>
</div>
<div class="form-group">
    <div class="text-center">
        {{ Form::submit('提交', ['class' => 'btn btn-success']) }}
        {{ Form::reset('重置', ['class' => 'btn btn-info']) }}
    </div>
</div>
{!! Form::close() !!}

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/bootstrap-fileinput/js/locales/zh.js') }}"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('content');
    $('input[name=cover]').fileinput({
        language: 'zh'
    });
</script>
@endsection