<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;
    protected $fillable =[
        'Connection',
        'type',
        'inbound',
        'outbound',
        'total',
        'remark',
        'month_date',
        'current_team_id',
        'active'

    ];
}
