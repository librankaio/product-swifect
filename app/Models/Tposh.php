<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tposh extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "tposhs";

    protected $fillable = [
        'no',
        'tdt',
        'code_mcust',
        'pay_method',
        'disc',
        'tax',
        'grdtotal',
        'note',
    ];
}
