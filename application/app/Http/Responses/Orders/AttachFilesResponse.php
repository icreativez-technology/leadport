<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [attach files] process for the orders
 * controller
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

 namespace App\Http\Responses\Orders;
use Illuminate\Contracts\Support\Responsable;

class AttachFilesResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for comments
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

        //prepend content on top of list
        $html = view('pages/order/components/attachment', compact('attachments'))->render();
        $jsondata['attachment'] = $html;

        //update whole kanban card
        $board['orders'] = $orders;
        $html = view('pages/orders/components/kanban/card', compact('board'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => "#card_order_" . $orders->first()->order_id,
            'action' => 'replace-with',
            'value' => $html);

        //response
        return response()->json($jsondata);
    }
}
