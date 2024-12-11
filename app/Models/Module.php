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
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $sigle
 * @property string|null $description
 * @property string|null $qualification
 * @property int|null $domaines_id
 * @property int|null $specialites_id
 * @property int|null $statuts_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Domaine|null $domaine
 * @property Specialite|null $specialite
 * @property Statut|null $statut
 * @property Collection|Collective[] $collectives
 * @property Collection|Commune[] $communes
 * @property Collection|Demandeur[] $demandeurs
 * @property Collection|Fcollective[] $fcollectives
 * @property Collection|Findividuelle[] $findividuelles
 * @property Collection|Formation[] $formations
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Agrement[] $agrements
 * @property Collection|Niveaux[] $niveauxes
 * @property Collection|Operateur[] $operateurs
 * @property Collection|Programme[] $programmes
 * @property Collection|Projet[] $projets
 *
 * @package App\Models
 */
class Module extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'modules';

	protected $casts = [
		'domaines_id' => 'int',
		'specialites_id' => 'int',
		'statuts_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'description',
		'qualification',
		'domaines_id',
		'specialites_id',
		'statuts_id'
	];

	public function operateurmodules()
	{
		return $this->hasMany(Operateurmodule::class, 'modules_id')->latest();
	}

	public function domaine()
	{
		return $this->belongsTo(Domaine::class, 'domaines_id');
	}

	public function specialite()
	{
		return $this->belongsTo(Specialite::class, 'specialites_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'statuts_id');
	}

	public function collectives()
	{
		return $this->hasMany(Collective::class, 'modules_id');
	}

	public function communes()
	{
		return $this->belongsToMany(Commune::class, 'communesmodules', 'modules_id', 'communes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function demandeurs()
	{
		return $this->belongsToMany(Demandeur::class, 'demandeursmodules', 'modules_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function fcollectives()
	{
		return $this->hasMany(Fcollective::class, 'modules_id');
	}

	public function findividuelles()
	{
		return $this->hasMany(Findividuelle::class, 'modules_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'modules_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'modules_id');
	}

	public function agrements()
	{
		return $this->belongsToMany(Agrement::class, 'modulesagrements', 'modules_id', 'agrements_id')
					->withPivot('id', 'moduleagrementstatut_id', 'deleted_at')
					->withTimestamps();
	}

	public function niveauxes()
	{
		return $this->belongsToMany(Niveaux::class, 'modulesniveauxs', 'modules_id', 'niveauxs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(Operateur::class, 'modulesoperateurs', 'modules_id', 'operateurs_id')
					->withPivot('id', 'moduleoperateurstatut_id', 'specialites', 'deleted_at')
					->withTimestamps();
	}

	public function programmes()
	{
		return $this->belongsToMany(Programme::class, 'programmesmodules', 'modules_id', 'programmes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function projets()
	{
		return $this->belongsToMany(Projet::class, 'projetsmodules', 'modules_id', 'projets_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
