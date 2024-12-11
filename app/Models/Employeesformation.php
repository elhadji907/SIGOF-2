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
 * Class Employeesformation
 * 
 * @property int $id
 * @property int $employees_id
 * @property int $formations_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee $employee
 * @property Formation $formation
 *
 * @package App\Models
 */
class Employeesformation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'employeesformations';

	protected $casts = [
		'employees_id' => 'int',
		'formations_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'formations_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}
}
