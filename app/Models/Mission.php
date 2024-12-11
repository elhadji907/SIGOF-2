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
 * Class Mission
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string|null $localites
 * @property int|null $distance
 * @property int|null $jours
 * @property Carbon|null $date_visa
 * @property Carbon|null $date_mandat
 * @property Carbon|null $date_ac
 * @property string|null $tva_ir
 * @property string|null $rejet
 * @property Carbon|null $date_cg
 * @property string|null $retour
 * @property string|null $paye
 * @property Carbon|null $date_paye
 * @property Carbon|null $date_depart
 * @property Carbon|null $date_retour
 * @property string|null $destination
 * @property float|null $montant
 * @property float|null $reliquat
 * @property float|null $accompt
 * @property int|null $employees_id
 * @property int|null $vehicules_id
 * @property int $courriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 * @property Employee|null $employee
 * @property Vehicule|null $vehicule
 *
 * @package App\Models
 */
class Mission extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'missions';

	protected $casts = [
		'distance' => 'int',
		'jours' => 'int',
		'montant' => 'float',
		'reliquat' => 'float',
		'accompt' => 'float',
		'employees_id' => 'int',
		'vehicules_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $dates = [
		'date_visa',
		'date_mandat',
		'date_ac',
		'date_cg',
		'date_paye',
		'date_depart',
		'date_retour'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'localites',
		'distance',
		'jours',
		'date_visa',
		'date_mandat',
		'date_ac',
		'tva_ir',
		'rejet',
		'date_cg',
		'retour',
		'paye',
		'date_paye',
		'date_depart',
		'date_retour',
		'destination',
		'montant',
		'reliquat',
		'accompt',
		'employees_id',
		'vehicules_id',
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

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'vehicules_id');
	}
}
