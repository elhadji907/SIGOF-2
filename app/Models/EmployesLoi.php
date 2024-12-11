<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employesloi
 * 
 * @property int $id
 * @property int $employes_id
 * @property int $lois_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loi $loi
 * @property Employee $employe
 *
 * @package App\Models
 */

class EmployesLoi extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'employeslois';

	protected $casts = [
		'employes_id' => 'int',
		'lois_id' => 'int'
	];

	protected $fillable = [
		'employes_id',
		'lois_id'
	];

	public function loi()
	{
		return $this->belongsTo(Loi::class, 'lois_id');
	}

	public function employe()
	{
		return $this->belongsTo(Employee::class, 'employes_id');
	}
}
