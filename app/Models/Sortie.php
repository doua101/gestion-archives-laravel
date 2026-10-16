<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    protected $fillable = [
        'entree_id',
        'date_sortie',
        'date_retour_prevue',
        'date_retour_reel',
        'etat_document'
    ];

    public function entree()
    {
        return $this->belongsTo(Entree::class);
    }
}
