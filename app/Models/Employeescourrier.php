<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employeescourrier
 * 
 * @property int $id
 * @property int $employees_id
 * @property int $courriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 * @property Employee $employee
 *
 * @package App\Models
 */
class Employeescourrier extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'employeescourriers';

	protected $casts = [
		'employees_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
