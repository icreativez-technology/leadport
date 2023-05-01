<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model {

    protected $table = 'goods';

    protected $fillable = [
        'tsk_id',
        'qty',
        'units',
        'kg_calc',
        'ldm',
        'value',
        'description',
        'volume',
        'length',
        'width',
        'height'
    ];
}