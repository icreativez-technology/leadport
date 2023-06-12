<!-- action buttons -->
@include('pages.orders.components.misc.list-page-actions')
<!-- action buttons -->

<!--stats panel-->
@if(auth()->user()->is_team)
<div id="orders-stats-wrapper" class="stats-wrapper card-embed-fix">
    @if (@count($orders) > 0) @include('misc.list-pages-stats') @endif
</div>
@endif
<!--stats panel-->

<!--orders and kanban layouts-->
@if(auth()->user()->pref_view_orders_layout =='list')
<div class="card-embed-fix  kanban-wrapper">
    @include('pages.orders.components.table.wrapper')
</div>
@else
<div class="card-embed-fix  kanban-wrapper">
    @include('pages.orders.components.kanban.wrapper')
</div>
@endif
<!--/#orders and kanban layouts-->

<!--filter-->
@if(auth()->user()->is_team)
@include('pages.orders.components.misc.filter-orders')
@endif
<!--filter-->

<!--order modal-->
@include('pages.order.modal')
