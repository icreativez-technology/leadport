<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDependency extends Model
{
    use HasFactory;

    protected $table = 'orders_dependencies';

    protected $primaryKey = 'ordersdependency_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['fooo_id'];
    const CREATED_AT = 'ordersdependency_created';
    const UPDATED_AT = 'ordersdependency_updated';
}
