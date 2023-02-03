<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class avis extends Model
{
    use HasFactory;

    protected $fillable = [

        'type',
        'intitule',
        'numero',
        'status',
        'fk_agent_cloture',
        'date_cloture',
        'fk_agent_destinataire',       
        'doc_content',
        'create_date',
        'create_agent',

    ];

}
