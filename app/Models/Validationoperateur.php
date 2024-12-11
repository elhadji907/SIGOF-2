<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Validationoperateur extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'validationoperateurs';

	protected $casts = [
		'operateurs_id' => 'int',
	];

	protected $fillable = [
		'uuid',
		'validated_id',
		'action',
		'session',
		'motif',
		'operateurs_id'
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
