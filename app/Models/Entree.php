<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    protected $fillable = [
        'document_id',
        'user_id',
        'date_entree',
        'motif'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sortie()
    {
        return $this->hasOne(Sortie::class);
    }
}