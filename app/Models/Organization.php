<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organization extends Model
{
    protected $fillable = [
        'name', 
        'slug', 
        'plan'
    ];
    
    // collectif possède plusieurs événements
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    //collectif possède plusieurs membres (utilisateurs)
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
        ->withPivot('role', 'joined_at');
        }//withPivot pour recuperer les colonnes role et joined_at de la table pivot
        //withPivot : Par défaut, Laravel ne lit que les ID dans la table pivot. 
        //Cette commande le force à récupérer aussi les données supplémentaires (le rôle et la date) 
        //pour qu'on puisse les afficher dans l'application (ex: $user->pivot->role).
}