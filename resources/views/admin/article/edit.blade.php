@extends('adminlte::page')

@section('content_header')
    <h1>修改文章</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.article.edit', $article->id), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('attribute_id') ? 'has-error' : '' }}">
    {{ Form::label('属性', null, ['class' => 'control-label']) }}
    {{ Form::select('attribute_id', $attributes, old('attribute_id') ?? $article->attribute_id, ['class' => 'form-control']) }}
    @if ($errors->has('attribute_id'))
        <span class="help-block">
            <strong>{{ $errors->first('attribute_id') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('标题', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? $article->name, ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    {{ Form::label('备注', null, ['class' => 'control-label']) }}
    {{ Form::textArea('summary', old('summary') ?? $article->summary, ['class' => 'form-control']) }}
    @if ($errors->has('summary'))
        <span class="help-block">
            <strong>{{ $errors->first('summary') }}</strong>
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
<div class="form-group {{ $errors->has('enabled') ? 'has-error' : '' }}">
    {{ Form::label('置顶', null, ['class' => 'control-label']) }}
    <div class="form-control">
        @if (old('enabled') ?? $article->enabled == 1)
            {{ Form::radio('enabled', 1, true) }}
        @else
            {{ Form::radio('enabled', 1) }}
        @endif
        {{ Form::label('&nbsp;是&nbsp;', null, ['class' => 'text-success']) }}
        @if (old('enabled') ?? $article->enabled == 0)
            {{ Form::radio('enabled', 0, true) }}
        @else
            {{ Form::radio('enabled', 0) }}
        @endif
        {{ Form::label('&nbsp;否&nbsp;', null, ['class' => 'text-muted']) }}
    </div>
    @if ($errors->has('enabled'))
        <span class="help-block">
            <strong>{{ $errors->first('enabled') }}</strong>
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
    var ue = UE.getEditor('content');
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
    ue.on('ready', function() {
        ue.setContent('{!! old('content') ?? $article->content !!}');
    });
    ue.on("focus", function (type, event) {
        $(ue.container.parentElement.nextElementSibling).children('strong').text('');
        $(ue.container.parentElement.parentElement).removeClass('has-error');
        return;
    });
    $(document).on('focus', 'form input,form textarea, form ', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
</script>
@endsection