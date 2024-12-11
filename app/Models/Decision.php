<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Decision extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'decisions';

	protected $casts = [
		'employees_id' => 'int',
	];

    protected $fillable = [
		'name',
		'employees_id',
		'uuid'
	];




	protected $dates = [
		'date_debut',
		'date_fin',
	];
   

    public function employe()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
