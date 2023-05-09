<?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="proposal_<?php echo e($proposal->doc_id); ?>">
    <?php if(config('visibility.proposals_col_checkboxes')): ?>
    <td class="proposals_col_checkbox checkproposal p-l-0" id="proposals_col_checkbox_<?php echo e($proposal->doc_id); ?>">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-proposals-<?php echo e($proposal->doc_id); ?>"
                name="ids[<?php echo e($proposal->doc_id); ?>]"
                class="listcheckbox listcheckbox-proposals filled-in chk-col-light-blue proposals-checkbox"
                data-actions-container-class="proposals-checkbox-actions-container"
                data-proposal-id="<?php echo e($proposal->doc_id); ?>">
            <label for="listcheckbox-proposals-<?php echo e($proposal->doc_id); ?>"></label>
        </span>
    </td>
    <?php endif; ?>

    <!--doc_id-->
    <td class="col_doc_id">
        <a href="<?php echo e(url('/proposals/'.$proposal->doc_id)); ?>"><?php echo e(runtimeProposalIdFormat($proposal->doc_id)); ?></a>
    </td>

    <!--doc_date_start-->
    <td class="col_doc_date_start">
        <?php echo e(runtimeDate($proposal->doc_date_start)); ?>

    </td>

    <!--client-->
    <?php if(config('visibility.col_client')): ?>
    <td class="col_client">
        <?php if($proposal->docresource_type == 'client'): ?>
        <a href="<?php echo e(url('/clients/'.$proposal->client_id)); ?>"
            title="<?php echo e($proposal->client_company_name ?? '---'); ?>"><?php echo e(str_limit($proposal->client_company_name ?? '---', 25)); ?></a>
        <?php else: ?>
        <a href="<?php echo e(url('/leads/v/'.$proposal->lead_id.'/view/')); ?>"
            title="<?php echo e(runtimeLeadNameTitle($proposal->lead_firstname, $proposal->lead_lastname, $proposal->lead_title)); ?>"><?php echo e(str_limit(runtimeLeadNameTitle($proposal->lead_firstname, $proposal->lead_lastname), 25)); ?></a>
        <?php endif; ?>
    </td>
    <?php endif; ?>

    <!--doc_title-->
    <td class="col_doc_title">
        <?php echo e(str_limit($proposal->doc_title ?? '---', 20)); ?>

    </td>

    <!--value-->
    <td class="col_value">
        <?php echo e(runtimeMoneyFormat($proposal->bill_final_amount)); ?>

    </td>

    <?php if(config('visibility.col_created_by')): ?>
    <td class="col_created_by">
        <img src="<?php echo e(getUsersAvatar($proposal->avatar_directory, $proposal->avatar_filename)); ?>" alt="user"
            class="img-circle avatar-xsmall">
        <?php echo e($proposal->first_name ?? runtimeUnkownUser()); ?>

    </td>
    <?php endif; ?>

    <!--doc_date_end-->
    <td class="col_doc_date_start">
        <?php echo e(runtimeDate($proposal->doc_date_end ?? '---')); ?>

    </td>

    <!--status-->
    <td class="col_foo">
        <span
            class="label <?php echo e(runtimeProposalStatusColors($proposal->doc_status, 'label')); ?>"><?php echo e(runtimeLang($proposal->doc_status)); ?></span>
    </td>

    <?php if(config('visibility.proposals_col_action')): ?>
    <td class="proposals_col_action actions_column" id="proposals_col_action_<?php echo e($proposal->doc_id); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
            <!--delete-->
            <?php if(config('visibility.action_buttons_delete')): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_product'))); ?>"
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/')); ?>/proposals/<?php echo e($proposal->doc_id); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <?php endif; ?>
            <!--edit-->
            <?php if(config('visibility.action_buttons_edit')): ?>
            <a type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm"
                href="<?php echo e(url('/proposals/'.$proposal->doc_id.'/edit')); ?>">
                <i class="sl-icon-note"></i>
            </a>
            <?php endif; ?>

            <!--view-->
            <a href="<?php echo e(_url('/proposals/'.$proposal->doc_id)); ?>" title="<?php echo e(cleanLang(__('lang.view'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
                <i class="ti-new-window"></i>
            </a>

            <!--more button (team)-->
            <?php if(config('visibility.action_buttons_edit') == 'show'): ?>
            <span class="list-table-action dropdown font-size-inherit">
                <button type="button" id="listTableAction" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" title="<?php echo e(cleanLang(__('lang.more'))); ?>"
                    class="data-toggle-action-tooltip btn btn-outline-default-light btn-circle btn-sm">
                    <i class="ti-more"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="listTableAction">

                    <!--proposal url-->
                    <a class="dropdown-item" href="<?php echo e(url('/proposals/view/'.$proposal->doc_unique_id.'?action=preview')); ?>"
                        target="_blank"><?php echo app('translator')->get('lang.proposal_url'); ?></a>

                    <!--actions button - email client -->
                    <a class="dropdown-item confirm-action-info" href="javascript:void(0)"
                        data-confirm-title="<?php echo e(cleanLang(__('lang.email_to_client'))); ?>"
                        data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                        data-url="<?php echo e(url('/proposals')); ?>/<?php echo e($proposal->doc_id); ?>/resend?ref=list">
                        <?php echo e(cleanLang(__('lang.email_to_client'))); ?></a>

                    <!--actions button - change category-->
                    <a class="dropdown-item actions-modal-button js-ajax-ux-request reset-target-modal-form"
                        href="javascript:void(0)" data-toggle="modal" data-target="#actionsModal"
                        data-modal-title="<?php echo e(cleanLang(__('lang.change_category'))); ?>"
                        data-url="<?php echo e(url('/proposals/change-category')); ?>"
                        data-action-url="<?php echo e(urlResource('/proposals/change-category?id='.$proposal->doc_id)); ?>"
                        data-loading-target="actionsModalBody" data-action-method="POST">
                        <?php echo app('translator')->get('lang.change_category'); ?></a>

                    <!--Mark As Accepted-->
                    <a class="dropdown-item confirm-action-danger <?php echo e(runtimeVisibility('document-status', 'accepted', $proposal->doc_status)); ?>"
                        href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.mark_as_accepted'))); ?>"
                        id="bill-actions-dettach-project" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                        data-url="<?php echo e(url('/proposals/'.$proposal->doc_id.'/change-status?status=accepted&ref=list')); ?>">
                        <?php echo app('translator')->get('lang.mark_as_accepted'); ?></a>

                    <!--Mark As Declined-->
                    <a class="dropdown-item confirm-action-danger <?php echo e(runtimeVisibility('document-status', 'declined', $proposal->doc_status)); ?>"
                        href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.mark_as_accepted'))); ?>"
                        id="bill-actions-dettach-project" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                        data-url="<?php echo e(url('/proposals/'.$proposal->doc_id.'/change-status?status=declined&ref=list')); ?>">
                        <?php echo app('translator')->get('lang.mark_as_declined'); ?></a>

                    <!--Mark As Revised-->
                    <a class="dropdown-item confirm-action-danger <?php echo e(runtimeVisibility('document-status', 'revised', $proposal->doc_status)); ?>"
                        href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.mark_as_revised'))); ?>"
                        id="bill-actions-dettach-project" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                        data-url="<?php echo e(url('/proposals/'.$proposal->doc_id.'/change-status?status=revised&ref=list')); ?>">
                        <?php echo app('translator')->get('lang.mark_as_revised'); ?></a>
                </div>
            </span>
            <?php endif; ?>
            <!--more button-->

        </span>
        <!--action button-->
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH /var/www/html/application/resources/views/pages/proposals/components/table/ajax.blade.php ENDPATH**/ ?>