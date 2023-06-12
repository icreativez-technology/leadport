<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [store] process for the projects
 * controller
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Orders;
use Illuminate\Contracts\Support\Responsable;

class StoreorderDependencyResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for team members
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        config([
            'permission.manage_dependency' => true,
        ]);

        $html = view('pages/order/dependency/ajax', compact('dependecies_all', 'task'))->render();
        $jsondata['dom_html'][] = [
            'selector' => '#order-dependency-list-container',
            'action' => 'replace',
            'value' => $html,
        ];

        //hide form
        $jsondata['dom_visibility'][] = [
            'selector' => '#order-dependency-create-container',
            'action' => 'hide',
        ];

        //show dependencies list
        $jsondata['dom_visibility'][] = [
            'selector' => '#order-dependency-list-container',
            'action' => 'show',
        ];

        //update the card
        $board['orders'] = $orders;
        $html = view('pages/orders/components/kanban/card', compact('board'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => "#card_order_" . $orders->first()->order_id,
            'action' => 'replace-with',
            'value' => $html);

        //update the row
        $html = view('pages/orders/components/table/ajax', compact('tasks'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => "#order_" . $orders->first()->order_id,
            'action' => 'replace-with',
            'value' => $html);

        //response
        return response()->json($jsondata);

    }

}