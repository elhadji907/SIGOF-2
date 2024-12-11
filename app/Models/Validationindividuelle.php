<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Validationindividuelle extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'validationindividuelles';

	protected $casts = [
		'individuelles_id' => 'int',
	];

	protected $fillable = [
		'uuid',
		'validated_id',
		'action',
		'motif',
		'individuelles_id'
	];

    
	public function individuelle()
	{
		return $this->belongsTo(Individuelle::class, 'individuelles_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'validated_id');
	}
}
