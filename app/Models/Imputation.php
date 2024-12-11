<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Imputation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $destinataire
 * @property string|null $sigle
 * @property Carbon|null $date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Courrier[] $courriers
 * @property Collection|Direction[] $directions
 * @property Collection|Employee[] $employees
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Imputation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'imputations';

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'destinataire',
		'sigle',
		'date'
	];

	public function courriers()
	{
		return $this->belongsToMany(Courrier::class, 'courriersimputations', 'imputations_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function directions()
	{
		return $this->belongsToMany(Direction::class, 'directionsimputations', 'imputations_id', 'directions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function employees()
	{
		return $this->belongsToMany(Employee::class, 'employeesimputations', 'imputations_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'usersimputations', 'imputations_id', 'users_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
