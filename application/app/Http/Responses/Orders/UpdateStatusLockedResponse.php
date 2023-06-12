<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [update status] process for the orders
 * controller
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

 namespace App\Http\Responses\Orders;
use Illuminate\Contracts\Support\Responsable;

class UpdateStatusLockedResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for orders
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //notice error
        $jsondata['notification'] = [
            'type' => 'force-error',
            'value' => __('lang.order_dependency_info_cannot_be_completed'),
        ];

        //update display text
        $jsondata['dom_html'][] = [
            'selector' => '#card-order-status-text',
            'action' => 'replace',
            'value' => runtimeLang($order->taskstatus_title),
        ];

        //remove loading
        $jsondata['dom_classes'][] = array(
            'selector' => '#card-order-status-text',
            'action' => 'remove',
            'value' => 'loading');

        //kanban view (if we had dragged and dropped)

        if (auth()->user()->pref_view_orders_layout == 'kanban') {
            
            //kanban - format
            $board['orders'] = $orders;
            $html = view('pages/orders/components/kanban/card', compact('board'))->render();

            //remove from complated board
            $jsondata['dom_visibility'][] = [
                'selector' => '#card_order_' . $order->order_id,
                'action' => 'hide-remove',
            ];

            //return to original board
            $jsondata['dom_html_end'][] = [
                'selector' => '#kanban-board-wrapper-' . $order->order_status,
                'action' => 'prepend',
                'value' => $html,
            ];
        }

        //response
        return response()->json($jsondata);

    }

}
