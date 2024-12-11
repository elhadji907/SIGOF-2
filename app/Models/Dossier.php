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
 * Class Dossier
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $dossier1
 * @property string|null $dossier2
 * @property string|null $dossier3
 * @property string|null $dossier4
 * @property string|null $dossier5
 * @property string|null $dossier6
 * @property string|null $dossier7
 * @property string|null $dossier8
 * @property string|null $dossier9
 * @property string|null $dossier10
 * @property string|null $dossier11
 * @property string|null $dossier12
 * @property string|null $dossier13
 * @property string|null $dossier14
 * @property string|null $dossier15
 * @property int $employees_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Dossier extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'dossiers';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'dossier1',
		'dossier2',
		'dossier3',
		'dossier4',
		'dossier5',
		'dossier6',
		'dossier7',
		'dossier8',
		'dossier9',
		'dossier10',
		'dossier11',
		'dossier12',
		'dossier13',
		'dossier14',
		'dossier15',
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employees_id');
	}
}
