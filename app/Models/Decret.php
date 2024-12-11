<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Decret extends Model
{
    
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'decrets';

    protected $fillable = [
		'name',
		'uuid'
	];

	public function employes()
	{
		return $this->belongsToMany(Employee::class, 'employesdecrets', 'decrets_id', 'employes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

}
