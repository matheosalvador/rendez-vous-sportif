<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = [
        'organization_id', 'sport_id', 'created_by', 
        'title', 'description', 'starts_at', 
        'duration_minutes', 'city', 'venue', 
        'capacity', 'public_token', 'status'
    ];
    // event  appartient à un collectif
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    // event appartient à un sport
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    // event  appartient à un créateur (utilisateur)
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    //  participants à l'événement via la table pivot "event_participants"
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_participants')
                    ->withPivot('status', 'registered_at');
    }
}