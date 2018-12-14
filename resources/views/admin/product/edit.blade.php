@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('content_header')
    <h1>修改产品</h1>
@stop

@section('content')
{!! Form::open(['url' => route('admin.product.edit', $product->id), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('标题', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? $product->name, ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    {{ Form::label('摘要', null, ['class' => 'control-label']) }}
    {{ Form::textArea('summary', old('summary') ?? $product->summary, ['class' => 'form-control']) }}
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
   
	<div style="display: flex;margin-bottom: 10px;line-height: 35px;">
	{{ Form::label('内容', null, ['class' => 'control-label']) }}
	<select class="form-control" onchange="contentTypeChange(this.value)" style="max-width: 300px;margin-left: 5px;">
		<option value="0">文本内容</option>
		<option value="1" @if($product->is_url) selected @endif>链接地址</option>
	</select>
	</div>
    @include('UEditor::head')
	<div name="content" id="content" style="min-height: 600px;"></div>
	
	<input type="text" name="is_url" value="{{$product->is_url}}" class="form-control" placeholder="输入链接地址" id="isUrl" style="@if($product->is_url) display:block; @endif">
    @if ($errors->has('content'))
        <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
	<input type="hidden" value="0" name="contentType" id="contentType"/>
</div>
<div class="form-group {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('排序', null, ['class' => 'control-label']) }}
    {{ Form::number('sort', old('sort') ?? $product->sort, ['class' => 'form-control']) }}
    @if ($errors->has('sort'))
        <span class="help-block">
            <strong>{{ $errors->first('sort') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('is_top') ? 'has-error' : '' }}">
    {{ Form::label('置顶', null, ['class' => 'control-label']) }}
    <div class="form-control">
        @if (old('is_top') ?? $product->is_top == 1)
            {{ Form::radio('is_top', 1, true) }}
        @else
            {{ Form::radio('is_top', 1) }}
        @endif
        {{ Form::label('&nbsp;是&nbsp;', null, ['class' => 'text-success']) }}
        @if (old('is_top') ?? $product->is_top == 0)
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
<div class="form-group {{ $errors->has('series_id') ? 'has-error' : '' }}">
    {{ Form::label('系列', null, ['class' => 'control-label']) }}
    {{ Form::select('series_id', $series, old('series_id') ?? $product->series_id, ['class' => 'form-control']) }}
    @if ($errors->has('series_id'))
        <span class="help-block">
            <strong>{{ $errors->first('series_id') }}</strong>
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
	
	function contentTypeChange(e){
		$('#contentType').val(e);
		if(e === '0'){
			$('#content').show();
			$('#isUrl').hide();
		} else {
			$('#content').hide();
			$('#isUrl').show();
		}
	}
    var ue = UE.getEditor('content');
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
    ue.on('ready', function() {
        ue.setContent('{!! old('content') ?? $product->content !!}');
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
    $(document).on('focus', 'form .file-caption-name', function(e) {
        $(this).parents('.form-group').children('.help-block').children('strong').text('');
        $(this).parents('.form-group').removeClass('has-error');
    });
    $('input[name=cover]').fileinput({
        language: 'zh',
        initialPreview: [
            '<img src="{{ $product->cover }}" class="file-preview-image kv-preview-data rotate-1" title="{{ $product->name }}" alt="{{ $product->name }}" style="width:auto;height:auto;max-width:100%;max-height:100%;">'
        ]
    });
	@if($product->is_url) setTimeout(function(){$('#content').hide(50);},300) @endif
</script>
@endsection