@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('content_header')
    <h1>新建案例</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.cases.create'), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('案例名', null, ['class' => 'control-label']) }}
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
<div class="form-group">
    {{ Form::label('内容', null, ['class' => 'control-label']) }}
@include('UEditor::head')
<div name="content" id="content" style="min-height: 600px;"></div>
</div>
<div class="form-group {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('排序', null, ['class' => 'control-label']) }}
    {{ Form::number('sort', 0, ['class' => 'form-control']) }}
    @if ($errors->has('sort'))
        <span class="help-block">
            <strong>{{ $errors->first('sort') }}</strong>
        </span>
    @endif
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
    {{ Form::label('分类', null, ['class' => 'control-label']) }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
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
    $(document).on('focus', 'form input,form textarea', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
    $(document).on('focus', 'form .file-caption-name', function(e) {
        $(this).parents('.form-group').children('.help-block').children('strong').text('');
        $(this).parents('.form-group').removeClass('has-error');
    });
    $(document).ready(function() {
        console.log({{ old('cover') }});
    });
</script>
@endsection