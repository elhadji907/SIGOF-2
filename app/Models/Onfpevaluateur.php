<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Onfpevaluateur extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'onfpevaluateurs';

    protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'name',
		'initiale',
		'telephone',
		'email',
		'fonction',
		'specialite',
		'date',
		'items1',
	];
    
	public function formations()
	{
		return $this->hasMany(Formation::class, 'onfpevaluateurs_id');
	}

}
