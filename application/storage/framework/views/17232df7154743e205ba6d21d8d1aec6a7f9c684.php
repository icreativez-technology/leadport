<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-sm-12 col-md-4 col-lg-3 click-url" id="project_<?php echo e($project->project_id); ?>" data-url="<?php echo e(url('/projects/'.$project->project_id)); ?>">

    <div class="grid-card m-b-35">

        <!--COVER IMAGE-->
        <?php if(config('visibility.card_cover_image')): ?>
        <div class="grid-card-img-container" <?php echo clean(getCoverImage($project->project_cover_directory ?? '', $project->project_cover_filename ?? '')); ?>>
        </div>
        <?php endif; ?>

        <div class="grid-card-content project-card">

            <!--TITLE-->
            <div class="x-title wordwrap" title="<?php echo e($project->project_title); ?>"><?php echo e(str_limit($project->project_title ??'---', 28)); ?>

                <!--ACTION BUTTONS (team)-->
                <?php if(config('visibility.action_buttons_edit')): ?>
                <span class="x-action-button" id="card-action-button-123" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></span>
                <div class="dropdown-menu dropdown-menu-small dropdown-menu-right js-stop-propagation"
                    aria-labelledby="listTableAction">
                    <?php echo $__env->make('pages.projects.views.common.dropdown-menu-team', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--change cover image-->
                    <?php if(config('visibility.edit_card_cover_image')): ?>
                    <a class="dropdown-item js-ajax-ux-request edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                        href="javascript:void(0)" data-toggle="modal" data-target="#commonModal"
                        data-modal-title="<?php echo e(cleanLang(__('lang.change_cover_image'))); ?>"
                        data-url="<?php echo e(urlResource('/projects/'.$project->project_id.'/change-cover-image')); ?>"
                        data-action-url="<?php echo e(urlResource('/projects/'.$project->project_id.'/change-cover-image')); ?>"
                        data-loading-target="commonModalBody" data-action-method="POST">
                        <?php echo e(cleanLang(__('lang.change_cover_image'))); ?></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

            <!--PROGRESS-->
            <div class="projects_col_progress progress m-t-4" data-toggle="tooltip"
                title="<?php echo e($project->project_progress); ?>%">
                <?php if($project->project_progress == 100): ?>
                <div class="progress-bar bg-success w-100 h-px-4 font-11 font-weight-500" data-toggle="tooltip"
                    title="100%" role="progressbar"></div>
                <?php else: ?>
                <div class="progress-bar bg-info h-px-4 font-16 font-weight-500 w-<?php echo e(round($project->project_progress)); ?>"
                    role="progressbar"></div>
                <?php endif; ?>
            </div>

            <div class="x-meta p-t-15">

                <!--STATUS-->
                <div class="projects_col_status m-b-9">
                    <span
                        class="label <?php echo e(runtimeProjectStatusColors($project->project_status, 'label')); ?>"><?php echo e(runtimeLang($project->project_status)); ?></span>
                    <!--archived-->
                    <?php if($project->project_active_state == 'archived' && runtimeArchivingOptions()): ?>
                    <span class="projects_col_status label label-icons label-icons-default" data-toggle="tooltip"
                        data-placement="top" title="<?php echo app('translator')->get('lang.archived'); ?>"><i class="ti-archive"></i></span>
                    <?php endif; ?>
                </div>

                <!--ID-->
                <div class="projects_col_client p-l-3">
                    <span><strong><?php echo app('translator')->get('lang.client'); ?>:</strong> <a
                            href="/clients/<?php echo e($project->project_clientid); ?>"><?php echo e(str_limit($project->client_company_name ??'---', 30)); ?></a></span>
                </div>

                <!--DATE CREATED-->
                <div class="projects_col_start_date p-l-3">
                    <span><strong><?php echo app('translator')->get('lang.start_date'); ?>:</strong> <?php echo e(runtimeDate($project->project_created)); ?></span>
                </div>

                <!--DUE DATE-->
                <div class="projects_col_end_date p-l-3">
                    <span><strong><?php echo app('translator')->get('lang.due_date'); ?>:</strong> <?php echo e(runtimeDate($project->project_date_due)); ?></span>
                </div>

                <!--ID-->
                <div class="p-l-3">
                    <span><strong><?php echo app('translator')->get('lang.id'); ?>:</strong> <?php echo e($project->project_id); ?></span>
                </div>

                <div class="p-t-3">
                    <!--assigned users-->
                    <?php if(count($project->assigned) > 0): ?>
                    <?php $__currentLoopData = $project->assigned->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e($user->avatar); ?>" data-toggle="tooltip" title="<?php echo e($user->first_name); ?>"
                        data-placement="top" alt="<?php echo e($user->first_name); ?>"
                        class="img-circle avatar-xsmall w-px-25 h-px-25">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <!--assigned users-->
                    <!--more users-->
                    <?php if(count($project->assigned) > 1): ?>
                    <?php $more_users_title = __('lang.assigned_users'); $users = $project->assigned; ?>
                    <?php echo $__env->make('misc.more-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <!--more users-->


                </div>

            </div>
        </div>
    </div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH /var/www/html/application/resources/views/pages/projects/views/cards/layout/ajax.blade.php ENDPATH**/ ?>