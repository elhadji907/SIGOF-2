<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'articles';

	protected $casts = [
		'employees_id' => 'int',
	];

    protected $fillable = [
		'name',
		'uuid'
	];

    public function employe()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
