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
 * Class Famille
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $civilite
 * @property string $prenom
 * @property string|null $nom
 * @property Carbon|null $date
 * @property string|null $lieu
 * @property string|null $status
 * @property string|null $adresse
 * @property string|null $telephone
 * @property string|null $email
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
class Famille extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'familles';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'civilite',
		'prenom',
		'nom',
		'date',
		'lieu',
		'status',
		'adresse',
		'telephone',
		'email',
		'employees_id',
		'employees_matricule'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
