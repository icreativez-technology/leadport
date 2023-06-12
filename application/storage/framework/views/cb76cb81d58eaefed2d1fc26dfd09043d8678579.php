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
                <td><?php echo e($good->unitid); ?></td>
                <td><?php echo e($good->kgcalc); ?></td>
                <td><?php echo e($good->ldm); ?></td>
                <td><?php echo e($good->value); ?></td>
                <td><?php echo e($good->description); ?></td>
                <td><?php echo e($good->volumem3); ?></td>
                <td><?php echo e($good->lengthcm); ?></td>
                <td><?php echo e($good->widthcm); ?></td>
                <td><?php echo e($good->heightcm); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH F:\xampp\htdocs\icreativez\livesoft\leadport\application\resources\views/misc/goods.blade.php ENDPATH**/ ?>