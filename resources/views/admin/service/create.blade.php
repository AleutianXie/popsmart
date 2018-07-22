@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('content_header')
    <h1>新建服务</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.service.create'), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('标题', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    {{ Form::label('摘要', null, ['class' => 'control-label']) }}
    {{ Form::textArea('summary', old('summary') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('summary'))
        <span class="help-block">
            <strong>{{ $errors->first('summary') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
    {{ Form::label('封图', null, ['class' => 'control-label']) }}
    {{ Form::file('cover') }}
    @if ($errors->has('cover'))
        <span class="help-block">
            <strong>{{ $errors->first('cover') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    {{ Form::label('内容', null, ['class' => 'control-label']) }}
    @include('UEditor::head')
    <div name="content" id="content" style="min-height: 600px;"></div>
    @if ($errors->has('content'))
        <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('排序', null, ['class' => 'control-label']) }}
    {{ Form::number('sort', old('sort') ?? 0, ['class' => 'form-control']) }}
    @if ($errors->has('sort'))
        <span class="help-block">
            <strong>{{ $errors->first('sort') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('is_top') ? 'has-error' : '' }}">
    {{ Form::label('置顶', null, ['class' => 'control-label']) }}
    <div class="form-control">
        @if (1 == old('is_top'))
            {{ Form::radio('is_top', 1, true) }}
        @else
            {{ Form::radio('is_top', 1) }}
        @endif
        {{ Form::label('&nbsp;是&nbsp;', null, ['class' => 'text-success']) }}
        @if (0 == old('is_top') ?? 0)
            {{ Form::radio('is_top', 0, true) }}
        @else
            {{ Form::radio('is_top', 0) }}
        @endif
        {{ Form::label('&nbsp;否&nbsp;', null, ['class' => 'text-muted']) }}
    </div>
    @if ($errors->has('is_top'))
        <span class="help-block">
            <strong>{{ $errors->first('is_top') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('module_id') ? 'has-error' : '' }}">
    {{ Form::label('分类', null, ['class' => 'control-label']) }}
    {{ Form::select('module_id', $modules, old('module_id'), ['class' => 'form-control']) }}
    @if ($errors->has('module_id'))
        <span class="help-block">
            <strong>{{ $errors->first('module_id') }}</strong>
        </span>
    @endif
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
    @if (old('content'))
        ue.on('ready', function() {
            ue.setContent('{!! old('content') !!}');
        });
    @endif
    ue.on("focus", function (type, event) {
        $(ue.container.parentElement.nextElementSibling).children('strong').text('');
        $(ue.container.parentElement.parentElement).removeClass('has-error');
        return;
    });
    $('input[name=cover]').fileinput({
        language: 'zh'
    });
    $(document).on('focus', 'form input,form textarea, form ', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
    $(document).on('focus', 'form .file-caption-name', function(e) {
        $(this).parents('.form-group').children('.help-block').children('strong').text('');
        $(this).parents('.form-group').removeClass('has-error');
    });
</script>
@endsection