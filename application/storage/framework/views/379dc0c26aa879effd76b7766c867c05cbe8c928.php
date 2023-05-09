<!--notes: expects an object named $tags. set this in calling template-->
<a tabindex="0" data-trigger="focus" data-toggle="popover" data-offset="0 4" data-html="true" data-placement="top" data-content="
             <div class='title'>All Tags</div>
             <div class='text-center'>
             <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <span class='tag'><?php echo e($tag->tag_title); ?></span>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>">
    <span class="btn btn-outline-secondary btn-more">
        <i class="ti-more"></i>
    </span>
</a><?php /**PATH /var/www/html/application/resources/views/misc/more-tags.blade.php ENDPATH**/ ?>