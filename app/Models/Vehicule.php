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
 * Class Vehicule
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $matricule
 * @property string|null $marque
 * @property string|null $type_carburant
 * @property string|null $kilometrage
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Mission[] $missions
 * @property Collection|Sorty[] $sorties
 *
 * @package App\Models
 */
class Vehicule extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'vehicules';

	protected $fillable = [
		'uuid',
		'matricule',
		'marque',
		'type_carburant',
		'kilometrage'
	];

	public function missions()
	{
		return $this->hasMany(Mission::class, 'vehicules_id');
	}

	public function sorties()
	{
		return $this->hasMany(Sorty::class, 'vehicules_id');
	}
}
