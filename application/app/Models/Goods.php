<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model {

    protected $table = 'goods';

    protected $fillable = [
        'tsk_id',
        'qty',
        'unitid',
        'kgcalc',
        'ldm',
        'value',
        'description',
        'volumem3',
        'lengthcm',
        'widthcm',
        'heightcm'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}