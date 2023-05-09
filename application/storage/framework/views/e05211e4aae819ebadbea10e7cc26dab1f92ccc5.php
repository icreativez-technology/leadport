<table class="table" id="table">
        <thead>
                <tr>
                    <th>Qty</th>
                    <th>Units</th>
                    <th>Kg calc</th>
                    <th>LDM</th>
                    <th>Value</th>
                    <th>Description</th>
                    <th>Volume(m3)</th>
                    <th>Length(cm)</th>
                    <th>Width(cm)</th>
                    <th>Height</th>
                    <th>Action</th>
                </tr>
        </thead>
        <?php if($task->goods): ?>
        <tbody id="goodsTable">
        <?php $__currentLoopData = $task->goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr id="<?php echo e($good->id); ?>">
                <td width="15%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][qty]" value="<?php echo e($good->qty); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][units]" value="<?php echo e($good->units); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][kg_calc]" value="<?php echo e($good->kg_calc); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][ldm]" value="<?php echo e($good->ldm); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][value]" value="<?php echo e($good->value); ?>"></td>
                <td width="30%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][description]" value="<?php echo e($good->description); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][volume]" value="<?php echo e($good->volume); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][length]" value="<?php echo e($good->length); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][width]" value="<?php echo e($good->width); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][height]" value="<?php echo e($good->height); ?>"></td>
                <td width="20%"><button type="button" class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm"  onclick="removeIndex(this)"><i class="sl-icon-trash"></i></button></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
        <?php endif; ?>
    </table> <?php /**PATH /var/www/html/application/resources/views/misc/edit-goods.blade.php ENDPATH**/ ?>