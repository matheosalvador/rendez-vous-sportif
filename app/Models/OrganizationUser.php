<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrganizationUser extends Model
{
    protected $table = 'organization_user'; // Nom de la table pivot
    protected $fillable = [
        'organization_id', 
        'user_id',
        'role',
    ];
    
    // collectif possède plusieurs événements
}