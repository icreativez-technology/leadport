<div class="boards count" id="tasks-view-wrapper">
    <!--each board-->
    @foreach($boards as $board)
    <!--board-->
    @include('pages.orders.components.kanban.board')
    @endforeach
</div>
<!--ajax element-->
<span class="hidden" data-url=""></span>

<!--filter-->
@if(auth()->user()->is_team)
@include('pages.orders.components.misc.filter-tasks')
@endif
<!--filter-->