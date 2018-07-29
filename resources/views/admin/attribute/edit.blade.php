@extends('adminlte::page')

@section('content_header')
    <h1>修改文章属性</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.attribute.edit', $attribute->id), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('属性名', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? $attribute->name, ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    {{ Form::label('备注', null, ['class' => 'control-label']) }}
    {{ Form::textArea('comment', old('comment') ?? $attribute->comment, ['class' => 'form-control']) }}
    @if ($errors->has('comment'))
        <span class="help-block">
            <strong>{{ $errors->first('comment') }}</strong>
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