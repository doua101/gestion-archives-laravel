<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['nom_division'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}