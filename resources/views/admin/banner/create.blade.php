@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('content_header')
    <h1>新建轮播图</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.banner.create'), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('标题', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
    {{ Form::label('链接', null, ['class' => 'control-label']) }}
    {{ Form::text('link', old('link') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('link'))
        <span class="help-block">
            <strong>{{ $errors->first('link') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('pic') ? 'has-error' : '' }}">
    {{ Form::label('图片', null, ['class' => 'control-label']) }}
    {{ Form::file('pic') }}
    @if ($errors->has('pic'))
        <span class="help-block">
            <strong>{{ $errors->first('pic') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    {{ Form::label('简述', null, ['class' => 'control-label']) }}
    {{ Form::textArea('summary', old('summary') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('summary'))
        <span class="help-block">
            <strong>{{ $errors->first('summary') }}</strong>
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
    $('input[name=pic]').fileinput({
        language: 'zh'
    });
    $(document).on('focus', 'form input, form textarea', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
    $(document).on('focus', 'form .file-caption-name', function(e) {
        $(this).parents('.form-group').children('.help-block').children('strong').text('');
        $(this).parents('.form-group').removeClass('has-error');
    });
</script>
@endsection