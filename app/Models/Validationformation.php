<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Validationformation extends Model
{
	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'validationformations';

	protected $casts = [
		'formations_id' => 'int',
	];

	protected $fillable = [
		'uuid',
		'validated_id',
		'action',
		'motif',
		'formations_id'
	];


	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'validated_id');
	}
}
