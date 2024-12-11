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
 * Class Departement
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $nom
 * @property int $regions_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Region $region
 * @property Collection|Arrondissement[] $arrondissements
 * @property Collection|Demandeur[] $demandeurs
 * @property Collection|Formation[] $formations
 * @property Collection|Individuelle[] $individuelles
 *
 * @package App\Models
 */
class Departement extends Model
{
	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'departements';

	protected $casts = [
		'regions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'regions_id'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id');
	}

	public function arrondissements()
	{
		return $this->hasMany(Arrondissement::class, 'departements_id');
	}

	public function demandeurs()
	{
		return $this->hasMany(Demandeur::class, 'departements_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'departements_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'departements_id');
	}
	public function operateurs()
	{
		return $this->hasMany(Operateur::class, 'departements_id');
	}
}
