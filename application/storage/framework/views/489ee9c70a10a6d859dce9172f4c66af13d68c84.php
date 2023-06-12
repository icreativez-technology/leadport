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
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][unitid]" value="<?php echo e($good->unitid); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][kgcalc]" value="<?php echo e($good->kgcalc); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][ldm]" value="<?php echo e($good->ldm); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][value]" value="<?php echo e($good->value); ?>"></td>
                <td width="30%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][description]" value="<?php echo e($good->description); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][volumem3]" value="<?php echo e($good->volumem3); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][lengthcm]" value="<?php echo e($good->lengthcm); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][widthcm]" value="<?php echo e($good->widthcm); ?>"></td>
                <td width="20%"><input type="text" class="form-control"  id="<?php echo e($good->id); ?>" name="goods[<?php echo e($good->id); ?>][heightcm]" value="<?php echo e($good->heightcm); ?>"></td>
                <td width="20%"><button type="button" class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm"  onclick="removeIndex(this)"><i class="sl-icon-trash"></i></button></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
        <?php endif; ?>
    </table> <?php /**PATH E:\xampp\htdocs\livesoft\leadport\application\resources\views/misc/edit-goods.blade.php ENDPATH**/ ?>