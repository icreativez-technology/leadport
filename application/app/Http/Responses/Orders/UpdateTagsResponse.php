<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [update] process for the orders
 * controller
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Orders;
use Illuminate\Contracts\Support\Responsable;

class UpdateTagsResponse implements Responsable {

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

        //full payload array
        $payload = $this->payload;

        $html = view('pages.order.components.tags', compact('tags', 'task', 'current_tags'))->render();
        $jsondata['dom_html'][] = [
            'selector' => '#card-tags-container',
            'action' => 'replace',
            'value' => $html,
        ];

        //response
        return response()->json($jsondata);

    }

}
