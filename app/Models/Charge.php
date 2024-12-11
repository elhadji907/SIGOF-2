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
 * Class Charge
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $etablissement
 * @property string|null $designation
 * @property string|null $observations
 * @property Carbon|null $date
 * @property int $employees_id
 * @property string|null $employees_matricule
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Charge extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'charges';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'etablissement',
		'designation',
		'observations',
		'date',
		'employees_id',
		'employees_matricule'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
