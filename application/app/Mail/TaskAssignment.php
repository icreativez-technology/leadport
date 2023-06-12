<?php

/** --------------------------------------------------------------------------------
 * This classes renders the [assign order] email and stores it in the queue
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class OrderAssignment extends Mailable {
    use Queueable;

    /**
     * The data for merging into the email
     */
    public $data;

    /**
     * Model instance
     */
    public $obj;

    /**
     * Model instance
     */
    public $user;

    public $emailerrepo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user = [], $data = [], $obj = []) {

        $this->data = $data;
        $this->user = $user;
        $this->obj = $obj;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        //email template
        if (!$template = \App\Models\EmailTemplate::Where('emailtemplate_name', 'Order Assignment')->first()) {
            return false;
        }

        //validate
        if (!$this->obj instanceof \App\Models\Order || !$this->user instanceof \App\Models\User) {
            return false;
        }

        //only active templates
        if ($template->emailtemplate_status != 'enabled') {
            return false;
        }

        //check if clients emails are disabled
        if ($this->user->type == 'client' && config('system.settings_clients_disable_email_delivery') == 'enabled') {
            return;
        }

        //get the order status
        if ($order_status = \App\Models\OrderStatus::Where('orderstatus_id', $this->obj->order_status)->first()) {
            $status = $order_status->orderstatus_title;
        } else {
            $status = '---';
        }

        //get common email variables
        $payload = config('mail.data');

        //set template variables
        $payload += [
            'first_name' => $this->user->first_name,
            'last_name'  => $this->user->last_name,
            'assigned_by_first_name' => auth()->user()->first_name,
            'assigned_by_last_name'  => auth()->user()->last_name,
            'order_id' =>    $this->obj->order_id,
            'order_title' => $this->obj->order_title,
            'order_created_date' => runtimeDate($this->obj->order_created),
            'order_date_start' => runtimeDate($this->obj->order_date_start),
            'order_description' => $this->obj->order_description,
            'order_date_due' => runtimeDate($this->obj->order_date_due),
            'project_title' => $this->obj->project_title,
            'project_id' => $this->obj->project_id,
            'client_name' => $this->obj->client_company_name,
            'client_id' => $this->obj->order_clientid,
            'order_status' => $status,
            'order_milestone' => $this->obj->milestone_title,
            'order_url' => url('/orders/v/' . $this->obj->order_id . '/view'),
        ];

        //save in the database queue
        $queue = new \App\Models\EmailQueue();
        $queue->emailqueue_to = $this->user->email;
        $queue->emailqueue_subject = $template->parse('subject', $payload);
        $queue->emailqueue_message = $template->parse('body', $payload);
        $queue->emailqueue_resourcetype = 'project';
        $queue->emailqueue_resourceid = $this->obj->project_id;
        $queue->save();
    }
}
