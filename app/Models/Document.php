<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title',
        'type',
        'emplacement',
        'statut',
        'division_id'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function entrees()
    {
        return $this->hasMany(Entree::class);
    }
}
