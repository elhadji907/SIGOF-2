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
 * Class Commune
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $nom
 * @property string|null $adresse
 * @property int $arrondissements_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Arrondissement $arrondissement
 * @property Collection|Agrement[] $agrements
 * @property Collection|Collective[] $collectives
 * @property Collection|Module[] $modules
 * @property Collection|Demandeur[] $demandeurs
 * @property Collection|Etablissement[] $etablissements
 * @property Collection|Formation[] $formations
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Operateur[] $operateurs
 * @property Collection|Pcharge[] $pcharges
 * @property Collection|Village[] $villages
 *
 * @package App\Models
 */
class Commune extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'communes';

	protected $casts = [
		'arrondissements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'adresse',
		'arrondissements_id'
	];

	public function arrondissement()
	{
		return $this->belongsTo(Arrondissement::class, 'arrondissements_id');
	}

	public function agrements()
	{
		return $this->hasMany(Agrement::class, 'communes_id');
	}

	public function collectives()
	{
		return $this->hasMany(Collective::class, 'communes_id');
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'communesmodules', 'communes_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function demandeurs()
	{
		return $this->hasMany(Demandeur::class, 'communes_id');
	}

	public function etablissements()
	{
		return $this->hasMany(Etablissement::class, 'communes_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'communes_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'communes_id');
	}

	public function operateurs()
	{
		return $this->hasMany(Operateur::class, 'communes_id');
	}

	public function pcharges()
	{
		return $this->hasMany(Pcharge::class, 'communes_id');
	}

	public function villages()
	{
		return $this->hasMany(Village::class, 'communes_id');
	}
}
