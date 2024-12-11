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
 * Class Employeesimputation
 * 
 * @property int $id
 * @property int $employees_id
 * @property int $imputations_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee $employee
 * @property Imputation $imputation
 *
 * @package App\Models
 */
class Employeesimputation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'employeesimputations';

	protected $casts = [
		'employees_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'imputations_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}

	public function imputation()
	{
		return $this->belongsTo(Imputation::class, 'imputations_id');
	}
}
