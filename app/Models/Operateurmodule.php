<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operateurmodule extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'operateurmodules';

    protected $casts = [
        'operateurs_id' => 'int',
        'users_id' => 'int',
    ];
    protected $fillable = [
        'uuid',
        'module',
        'domaine',
        'categorie',
        'niveau_qualification',
        'statut',
        'motif',
        'users_id',
        'validated_id',
        'operateurs_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function operateur()
    {
        return $this->belongsTo(Operateur::class, 'operateurs_id')->latest();
    }

    
	public function moduleoperateurstatuts()
	{
		return $this->hasMany(Moduleoperateurstatut::class, 'operateurmodules_id');
	}
}
