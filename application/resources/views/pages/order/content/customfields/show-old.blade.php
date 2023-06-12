<style>
    .modal-body table td, .modal-body table th,
    .card-description table td, .card-description table th,
    .card-show-form-data table td,
   .card-show-form-data table th {
    padding: 5px;
    font-size: 9px;
}
</style>
<!--heading-->
<div class="x-heading p-t-10"><i class="mdi mdi-file-document-box"></i>{{ cleanLang(__('lang.request_details')) }}</div>

<!--Form Data-->
<div class="card-show-form-data" id="card-task-organisation">
@if(count($fields ?? []) > 0) 
@foreach($fields as $field) 
<div class="form-data-row">
        <span class="x-data-title">{{ $field->customfields_title }}:</span>
        <span class="x-data-content {{ $field->customfields_datatype }}">{!!
            customFieldValueDisplay($field->customfields_name, $task, $field->customfields_datatype) !!}</span>

</div>
@endforeach
@if($task->goods)
<div class="goods">
<span><strong>Goods :</strong></span>  
<br/>
<table class="table" id="goodsTable">
    <tr>
        <th>Qty</th>
        <th>Units</th>
        <th>Kg Calc</th>
        <th>LDM</th>
        <th>Value</th>
        <th>Description</th>
        <th>Volume(m3)</th>
        <th>Length(cm)</th>
        <th>Width(cm)</th>
        <th>Height(cm)</th>
    </tr>
    @foreach($task->goods as $good) 
    <tr>
                 <td>{{ $good->qty}}</td>
                <td>{{ $good->units}}</td>
                <td>{{ $good->kg_calc}}</td>
                <td>{{ $good->ldm}}</td>
                <td>{{ $good->value}}</td>
                <td>{{ $good->description}}</td>
                <td>{{ $good->volume}}</td>
                <td>{{ $good->length}}</td>
                <td>{{ $good->width}}</td>
                <td>{{ $good->height}}</td>
    </tr>
    @endforeach
</table>
</div>
@endif

@if(config('app.application_demo_mode'))
<!--DEMO INFO-->
<div class="alert alert-info">
    <h5 class="text-info"><i class="sl-icon-info"></i> Demo Info</h5> 
    These are custom fields. You can change them or <a href="{{ url('app/settings/customfields/projects') }}">create your own.</a>
</div>
@endif

<br>
<!--edit button-->
@if(config('visibility.task_editing_buttons'))
<div class="form-data-row-buttons">
    <button type="button" class="btn waves-effect waves-light btn-xs btn-info ajax-request"
        data-url="{{ url('tasks/content/'.$task->task_id.'/edit-customfields') }}"
        data-loading-class="loading-before-centre"
        data-loading-target="card-tasks-left-panel">@lang('lang.edit')</button>
</div>
@endif

@else

<div class="x-no-result">
    <img src="{{ url('/') }}/public/images/no-download-avialble.png" alt="404 - Not found" /> 
    <div class="p-t-20"><h4>{{ cleanLang(__('lang.you_do_not_have_custom_fields')) }}</h4></div>
    @if(auth()->user()->is_admin)
    <div class="p-t-10">
        <a href="{{ url('app/settings/customfields/tasks') }}" class="btn btn-info btn-sm">@lang('lang.create_custom_fields')</a>
    </div>
    @endif
</div>
@endif
</div>