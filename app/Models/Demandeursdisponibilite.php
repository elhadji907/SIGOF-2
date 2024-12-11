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
 * Class Demandeursdisponibilite
 * 
 * @property int $id
 * @property int $demandeurs_id
 * @property int $disponibilites_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Demandeur $demandeur
 * @property Disponibilite $disponibilite
 *
 * @package App\Models
 */
class Demandeursdisponibilite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'demandeursdisponibilites';

	protected $casts = [
		'demandeurs_id' => 'int',
		'disponibilites_id' => 'int'
	];

	protected $fillable = [
		'demandeurs_id',
		'disponibilites_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(Demandeur::class, 'demandeurs_id');
	}

	public function disponibilite()
	{
		return $this->belongsTo(Disponibilite::class, 'disponibilites_id');
	}
}
