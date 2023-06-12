<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for templates
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\OrderDependency;
use Illuminate\Http\Request;

class OrderDependencyRepository {

    /**
     * The orderdependency repository instance.
     */
    protected $orderdependency;

    /**
     * Inject dependecies
     */
    public function __construct(OrderDependency $orderdependency) {
        $this->orderdependency = $orderdependency;
    }

    /**
     * Search model
     * @param int $id optional for getting a single, specified record
     * @return object orderdependency collection
     */
    public function search($id = '') {

        $orderdependency = $this->orderdependency->newQuery();

        // all client fields
        $orderdependency->selectRaw('*');

        //joins
        $orderdependency->leftJoin('orders', 'orders.order_id', '=', 'orders_dependencies.ordersdependency_blockerid');

        //default where
        $orderdependency->whereRaw("1 = 1");

        //order id
        if(is_numeric($id)){
            $orderdependency->Where('ordersdependency_orderid', $id);
        }

        //filter: currently blocking
        if (request('filter_currently_blocking')) {
            $orderdependency->Where('order_status', '!=', 'completed');
        }

        //sorting
        $orderdependency->orderBy('order_title', 'asc');

        // Get the results and return them.
        return $orderdependency->paginate(1000);
    }
}