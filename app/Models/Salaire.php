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
 * Class Salaire
 * 
 * @property int $id
 * @property string $uuid
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_fin
 * @property float|null $charges_patronale
 * @property float|null $charge_salariale
 * @property float|null $brut
 * @property int $employees_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Salaire extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'salaires';

	protected $casts = [
		'charges_patronale' => 'float',
		'charge_salariale' => 'float',
		'brut' => 'float',
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
		'charges_patronale',
		'charge_salariale',
		'brut',
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
