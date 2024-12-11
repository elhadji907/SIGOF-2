<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commissionagrement extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'commissionagrements';

    protected $casts = [
		'date' => 'datetime'
    ];
    /* 
	protected $dates = [,
		'date',
	]; */

    protected $fillable = [
        'uuid',
        'commission',
        'date',
        'session',
        'lieu',
        'annee',
        'statut',
        'description',
    ];

	public function operateurs()
	{
		return $this->hasMany(Operateur::class, 'commissionagrements_id');
	}
}
