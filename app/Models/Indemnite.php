<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indemnite extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $table = 'indemnites';
    
	protected $fillable = [
		'uuid',
		'name'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class, 'indemnites_id');
	}
}
