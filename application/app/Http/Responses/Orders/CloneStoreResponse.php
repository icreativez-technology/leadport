<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [show] process for the orders
 * controller
 *
 * [IMPORTANT] All Left Panel code must be reproduced in the file ContentResponse.php
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

 namespace App\Http\Responses\Orders;
use Illuminate\Contracts\Support\Responsable;

class CloneStoreResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //full payload array
        $payload = $this->payload;

        //we are cloning to the same project that we are viewing or we are just on a general order list page
        if ((request('taskresource_id') == $order->order_projectid) || !request()->filled('taskresource_id')) {

            //kanban - add a new card
            $board['tasks'] = $orders;
            $html = view('pages/orders/components/kanban/card', compact('board'))->render();
            $jsondata['dom_html_end'][] = [
                'selector' => '#kanban-board-wrapper-' . $order->order_status,
                'action' => 'prepend',
                'value' => $html,
            ];

            //table - add a new row
            $html = view('pages/orders/components/table/ajax', compact('tasks'))->render();
            $jsondata['dom_html'][] = array(
                'selector' => '#tasks-td-container',
                'action' => 'prepend',
                'value' => $html);
        }

        //close modal
        $jsondata['dom_visibility'][] = [
            'selector' => '#commonModal', 'action' => 'close-modal',
        ];

        //ajax response
        return response()->json($jsondata);

    }

}
