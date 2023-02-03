<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class details_csps extends Model
{
    use HasFactory;

    protected $fillable = [

        'fk_controle',
        'type',
        'contenu',
        'css',
        'y_order',
        'create_date',
        'create_agent',

    ];

}
