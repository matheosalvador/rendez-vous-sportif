<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    protected $fillable = ['name', 'slug', 'active'];
    // Relation : Un sport possède plusieurs événements
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
        // grace a cette methode $sport->events p recuperer tous les evenements d un sport
    }
}