<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historiqueagrement extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'historiqueagrements';

    protected $casts = [
		'operateurs_id' => 'int',
		'commissionagrements_id' => 'int',
		'validated_id' => 'int',
	];

    protected $fillable = [
        'uuid',
        'commission',
        'motif',
        'statut',
        'validated_id',
        'operateurs_id',
        'commissionagrements_id',
    ];

    
	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'validated_id');
	}
}
