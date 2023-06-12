<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'orders_status';

    protected $primaryKey = 'taskstatus_id';
    protected $guarded = ['taskstatus_id'];
    protected $dateFormat = 'Y-m-d H:i:s';
    const CREATED_AT = 'taskstatus_created';
    const UPDATED_AT = 'taskstatus_updated';

    /**
     * relatioship business rules:
     *         - the Order Status can have many Tasks
     *         - the Order belongs to one Order Status
     */
    public function orders() {
        return $this->hasMany('App\Models\Order', 'order_status', 'orderstatus_id');
    }
}
