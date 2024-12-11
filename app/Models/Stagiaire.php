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
 * Class Stagiaire
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $matricule
 * @property int|null $employees_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee|null $employee
 *
 * @package App\Models
 */
class Stagiaire extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'stagiaires';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
