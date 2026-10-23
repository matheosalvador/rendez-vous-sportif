<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrganizationMember extends Model
{
    protected $table = 'organization_user'; // Nom de la table pivot
    public $timestamps = false;
    protected $fillable = [
        'organization_id', 
        'user_id',
        'role',
    ];
    
}