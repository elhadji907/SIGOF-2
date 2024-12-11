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
 * Class Etat
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property Carbon|null $date_recep
 * @property string|null $designation
 * @property string|null $observation
 * @property float|null $montant
 * @property Carbon|null $date_depart
 * @property Carbon|null $date_retour
 * @property Carbon|null $date_transmission
 * @property Carbon|null $date_dg
 * @property Carbon|null $date_ac
 * @property int $courriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 *
 * @package App\Models
 */
class Etat extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'etats';

	protected $casts = [
		'montant' => 'float',
		'courriers_id' => 'int'
	];

	protected $dates = [
		'date_recep',
		'date_depart',
		'date_retour',
		'date_transmission',
		'date_dg',
		'date_ac'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_recep',
		'designation',
		'observation',
		'montant',
		'date_depart',
		'date_retour',
		'date_transmission',
		'date_dg',
		'date_ac',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}
}
