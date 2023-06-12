<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAssigned extends Model
{
    use HasFactory;

    protected $table = 'orders_assigned';

    protected $primaryKey = 'ordersassigned_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['ordersassigned_id'];
    const CREATED_AT = 'ordersassigned_created';
    const UPDATED_AT = 'ordersassigned_updated';
}
