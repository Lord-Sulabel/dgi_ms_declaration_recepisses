<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class dgi_avis extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'type',
        'intitule',
        'numero',
        'status',
        'fk_agentCloture',
        'dateCloture',
        'fk_agentDestinataire',       
        'docContent',
        
    ];

}
