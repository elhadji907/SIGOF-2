<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Validationcollective extends Model
{
	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'validationcollectives';

	protected $casts = [
		'collectives_id' => 'int',
	];

	protected $fillable = [
		'uuid',
		'validated_id',
		'action',
		'motif',
		'collectives_id'
	];


	public function collective()
	{
		return $this->belongsTo(Collective::class, 'collectives_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'validated_id');
	}
}
