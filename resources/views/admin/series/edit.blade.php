@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('content_header')
    <h1>修改产品系列</h1>
@stop

@section('content')
{!! Form::open(['url' => route('admin.series.edit', $series->id), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('系列名', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? $series->name, ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
    {{ Form::label('图标', null, ['class' => 'control-label']) }}
    {{ Form::file('icon') }}
    @if ($errors->has('icon'))
        <span class="help-block">
            <strong>{{ $errors->first('icon') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('overview') ? 'has-error' : '' }}">
    {{ Form::label('简述', null, ['class' => 'control-label']) }}
    {{ Form::textArea('overview', old('overview') ?? $series->overview, ['class' => 'form-control']) }}
    @if ($errors->has('overview'))
        <span class="help-block">
            <strong>{{ $errors->first('overview') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('排序', null, ['class' => 'control-label']) }}
    {{ Form::number('sort', old('sort') ?? $series->sort, ['class' => 'form-control']) }}
    @if ($errors->has('sort'))
        <span class="help-block">
            <strong>{{ $errors->first('sort') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('is_top') ? 'has-error' : '' }}">
    {{ Form::label('置顶', null, ['class' => 'control-label']) }}
    <div class="form-control">
        @if (old('is_top') ?? $series->is_top == 1)
            {{ Form::radio('is_top', 1, true) }}
        @else
            {{ Form::radio('is_top', 1) }}
        @endif
        {{ Form::label('&nbsp;是&nbsp;', null, ['class' => 'text-success']) }}
        @if (old('is_top') ?? $series->is_top == 0)
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
    $('input[name=icon]').fileinput({
        @if ($series->icon)
        language: 'zh',
        initialPreview: [
            '<img src="{{ $series->icon }}" class="file-preview-image" alt="{{ $series->name }}">'
        ]
        @else
        language: 'zh'
        @endif

    });
    $(document).on('focus', 'form input', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
    $(document).on('focus', 'form .file-caption-name', function(e) {
        $(this).parents('.form-group').children('.help-block').children('strong').text('');
        $(this).parents('.form-group').removeClass('has-error');
    });
</script>
@endsection