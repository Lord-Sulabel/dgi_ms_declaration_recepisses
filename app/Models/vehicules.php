<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class vehicules extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisation',
        'genre',
        'energie',
        'puissance_fiscale',
        'fk_proprietaire',
        'type_proprietaire',
        'marque',
        'modele',
        'annee_fabrication',
        'nombre_chevaux',
        'poid_vide',
        'poid_charge',
        'numero_chassis',
        'numero_moteur',
        'couleur',
        'provenance',
        'date_mec_initiale',
        'status',
        'create_date',
        'create_agent',
    ];

}
