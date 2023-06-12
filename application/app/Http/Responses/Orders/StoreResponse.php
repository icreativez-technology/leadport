<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [store] process for the orders settings
 * controller
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/
namespace App\Http\Responses\Orders;
use Illuminate\Contracts\Support\Responsable;

class StoreResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for order members
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //prepend content on top of list or show full table
        if (auth()->user()->pref_view_orders_layout == 'list') {
            if ($count == 1) {
                $html = view('pages/orders/components/table/table', compact('tasks'))->render();
                $jsondata['dom_html'][] = array(
                    'selector' => '#orders-view-wrapper',
                    'action' => 'replace',
                    'value' => $html);
            } else {
                //prepend use on top of list
                $html = view('pages/orders/components/table/ajax', compact('tasks'))->render();
                $jsondata['dom_html'][] = array(
                    'selector' => '#orders-td-container',
                    'action' => 'prepend',
                    'value' => $html);
            }
        }

        if (auth()->user()->pref_view_orders_layout == 'kanban') {
            //prepend use on top of list
            $html = view('pages/orders/components/kanban/card', compact('board'))->render();
            $jsondata['dom_html'][] = array(
                'selector' => '#kanban-board-wrapper-' . request('task_status'),
                'action' => 'prepend',
                'value' => $html);
        }

        //refresh stats
        if (isset($stats)) {
            $html = view('misc/list-pages-stats-content', compact('stats'))->render();
            $jsondata['dom_html'][] = [
                'selector' => '#list-pages-stats-widget',
                'action' => 'replace',
                'value' => $html,
            ];
        }

        //show order after adding
        if (request('ref') == 'quickadd' && request('show_after_adding') == 'on') {
            $jsondata['redirect_url'] = url("/orders/v/" . $order->order_id . "/" . str_slug($order->order_title));
        }

        //close modal
        $jsondata['dom_visibility'][] = array('selector' => '#commonModal', 'action' => 'close-modal');

        //notice
        $jsondata['notification'] = array('type' => 'success', 'value' => __('lang.request_has_been_completed'));

        //response
        return response()->json($jsondata);

    }

}
