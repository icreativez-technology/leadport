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
    <?php $__currentLoopData = $task->goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <tr>
                <td><?php echo e($good->qty); ?></td>
                <td><?php echo e($good->units); ?></td>
                <td><?php echo e($good->kg_calc); ?></td>
                <td><?php echo e($good->ldm); ?></td>
                <td><?php echo e($good->value); ?></td>
                <td><?php echo e($good->description); ?></td>
                <td><?php echo e($good->volume); ?></td>
                <td><?php echo e($good->length); ?></td>
                <td><?php echo e($good->width); ?></td>
                <td><?php echo e($good->height); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH E:\xampp\htdocs\livesoft\livecrm\application\resources\views/misc/goods.blade.php ENDPATH**/ ?>