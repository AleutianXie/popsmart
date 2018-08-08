@extends('adminlte::page')

@section('content_header')
    <h1>修改职位</h1>
@stop

@section('content')

{!! Form::open(['url' => route('admin.job.edit', $job->id), 'files' => true ]) !!}
<div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
    {{ Form::label('部门', null, ['class' => 'control-label']) }}
    {{ Form::select('department_id', $departments, old('department_id') ?? $job->department_id, ['class' => 'form-control']) }}
    @if ($errors->has('department_id'))
        <span class="help-block">
            <strong>{{ $errors->first('department_id') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('职位名称', null, ['class' => 'control-label']) }}
    {{ Form::text('name', old('name') ?? $job->name, ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    {{ Form::label('简述', null, ['class' => 'control-label']) }}
    {{ Form::textArea('summary', old('summary') ?? $job->summary, ['class' => 'form-control']) }}
    @if ($errors->has('summary'))
        <span class="help-block">
            <strong>{{ $errors->first('summary') }}</strong>
        </span>
    @endif
</div>
@include('UEditor::head')
<div class="form-group {{ $errors->has('duty') ? 'has-error' : '' }}">
    {{ Form::label('工作职责', null, ['class' => 'control-label']) }}
    <div name="duty" id="duty" style="min-height: 600px;"></div>
    @if ($errors->has('duty'))
        <span class="help-block">
            <strong>{{ $errors->first('duty') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('requirements') ? 'has-error' : '' }}">
    {{ Form::label('任职要求', null, ['class' => 'control-label']) }}
    <div name="requirements" id="requirements" style="min-height: 600px;"></div>
    @if ($errors->has('requirements'))
        <span class="help-block">
            <strong>{{ $errors->first('requirements') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('sort') ? 'has-error' : '' }}">
    {{ Form::label('排序', null, ['class' => 'control-label']) }}
    {{ Form::number('sort', old('sort') ?? $job->sort, ['class' => 'form-control']) }}
    @if ($errors->has('sort'))
        <span class="help-block">
            <strong>{{ $errors->first('sort') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('is_top') ? 'has-error' : '' }}">
    {{ Form::label('置顶', null, ['class' => 'control-label']) }}
    <div class="form-control">
        @if (old('is_top') ?? $job->is_top == 1)
            {{ Form::radio('is_top', 1, true) }}
        @else
            {{ Form::radio('is_top', 1) }}
        @endif
        {{ Form::label('&nbsp;是&nbsp;', null, ['class' => 'text-success']) }}
        @if (old('is_top') ?? $job->is_top == 0)
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
<div class="form-group {{ $errors->has('tag_id') ? 'has-error' : '' }}">
    {{ Form::label('标签', null, ['class' => 'control-label']) }}
    {{ Form::select('tag_id[]', array_prepend($tags, 'zero'), null, ['class' => 'form-control']) }}
    @if ($errors->has('tag_id'))
        <span class="help-block">
            <strong>{{ $errors->first('tag_id') }}</strong>
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
    var due = UE.getEditor('duty');
        due.ready(function() {
        due.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    }); 
    due.on('ready', function() {
        due.setContent('{!! old('duty') ?? $job->duty !!}');
    });
    due.on("focus", function (type, event) {
        $(due.container.parentElement.nextElementSibling).children('strong').text('');
        $(due.container.parentElement.parentElement).removeClass('has-error');
        return;
    });
    var rue = UE.getEditor('requirements');
        rue.ready(function() {
        rue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    }); 
    rue.on('ready', function() {
        rue.setContent('{!! old('requirements') ?? $job->requirements !!}');
    });
    rue.on("focus", function (type, event) {
        $(rue.container.parentElement.nextElementSibling).children('strong').text('');
        $(rue.container.parentElement.parentElement).removeClass('has-error');
        return;
    });
    $(document).on('focus', 'form input,form textarea, form ', function(e) {
        $(this).next().children('strong').text('');
        $(this).parent().removeClass('has-error');
    });
    $("select[name^='tag_id']").select2({
        tags: true,
        multiple: true,
        tokenSeparators: [',', ' '],
        templateResult: function (state) {
            // 过滤掉已经被选中的result
            console.log(state, state.selected);
            if (state.selected) {
                return null;
            }
            return state.text;
        }
    }).val(
        [
            @foreach($job->tags as $tag)
            {{ $tag->id }},
            @endforeach
        ]).trigger('change');
    // 后端校验失败时，保存上次选择的用户
    @if (old('tag_id'))
    $("select[name^='tag_id']").val(
        [
            @foreach(old('tag_id') as $id)
            {{ $id }},
            @endforeach
        ]
    ).trigger('change');
    @endif
</script>
@endsection