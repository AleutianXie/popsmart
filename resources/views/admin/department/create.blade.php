@extends('adminlte::page')

@section('content_header')
    <h1>新建部门</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.department.create'), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('部门名', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    {{ Form::label('备注', null, ['class' => 'control-label']) }}
    {{ Form::textArea('comment', old('comment') ?? '', ['class' => 'form-control']) }}
    @if ($errors->has('comment'))
        <span class="help-block">
            <strong>{{ $errors->first('comment') }}</strong>
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
<!-- 实例化编辑器 -->
<script type="text/javascript">
    $(document).on('focus', 'form input,form textarea, form ', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
</script>
@endsection