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
 * Class Conger
 * 
 * @property int $id
 * @property string $uuid
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_fin
 * @property int $employees_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Conger extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'congers';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'date_debut',
		'date_fin',
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
