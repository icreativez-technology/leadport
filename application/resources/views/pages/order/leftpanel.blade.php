<!--title-->
@include('pages.order.components.title')

<!--[dependency][lock-1] start-->
@if(config('visibility.task_is_locked'))
<div class="alert alert-warning">@lang('lang.task_dependency_info_cannot_be_started')</div>
@else


<!--description-->
@include('pages.order.components.description')

<!--checklist-->
@include('pages.order.components.checklists')

<!--attachments-->
@include('pages.order.components.attachments')

<!--comments-->
@if(config('visibility.tasks_standard_features'))
<div class="card-comments" id="card-comments">
    <div class="x-heading"><i class="mdi mdi-message-text"></i>Comments</div>
    <div class="x-content">
        @include('pages.order.components.post-comment')
        <!--comments-->
        <div id="card-comments-container">
            <!--dynamic content here-->
        </div>
    </div>
</div>
@endif
@endif
<!--[dependency][lock-1] end-->