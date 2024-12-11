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
 * Class Disponibilite
 * 
 * @property int $id
 * @property string $uuid
 * @property Carbon $date1
 * @property Carbon|null $date2
 * @property Carbon|null $date3
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Demandeur[] $demandeurs
 *
 * @package App\Models
 */
class Disponibilite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'disponibilites';

	protected $dates = [
		'date1',
		'date2',
		'date3'
	];

	protected $fillable = [
		'uuid',
		'date1',
		'date2',
		'date3'
	];

	public function demandeurs()
	{
		return $this->belongsToMany(Demandeur::class, 'demandeursdisponibilites', 'disponibilites_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
