<div class="boards count" id="tasks-view-wrapper">
    <!--each board-->
    <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--board-->
    <?php echo $__env->make('pages.orders.components.kanban.board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!--ajax element-->
<span class="hidden" data-url=""></span>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.orders.components.misc.filter-tasks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter--><?php /**PATH E:\xampp\htdocs\livesoft\leadport\application\resources\views/pages/orders/components/kanban/kanban.blade.php ENDPATH**/ ?>