<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nommination extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'nomminations';

    protected $casts = [
		'date_debut' => 'datetime',
		'date_fin' => 'datetime',
		'employees_id'=> 'int',
	];

	protected $dates = [
		'date_debut',
		'date_fin',
	];
    protected $fillable = [
		'name',
		'date_debut',
		'date_fin',
		'employees_id',
		'uuid'
	];

    public function employe()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
