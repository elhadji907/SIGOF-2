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
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $cin
 * @property string|null $numero_dossier
 * @property string|null $statut
 * @property string|null $type
 * @property string|null $items1
 * @property string|null $items2
 * @property Carbon|null $date1
 * @property string|null $file1
 * @property int $users_id
 * @property int|null $items_id
 * @property int|null $types_demandes_id
 * @property int|null $courriers_id
 * @property int|null $zones_id
 * @property int|null $localites_id
 * @property int|null $arrondissements_id
 * @property int|null $regions_id
 * @property int|null $departements_id
 * @property int|null $communes_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Arrondissement|null $arrondissement
 * @property Commune|null $commune
 * @property Courrier|null $courrier
 * @property Departement|null $departement
 * @property Item|null $item
 * @property Localite|null $localite
 * @property Region|null $region
 * @property TypesDemande|null $types_demande
 * @property User $user
 * @property Zone|null $zone
 * @property Collection|Collective[] $collectives
 * @property Collection|Commentaire[] $commentaires
 * @property Collection|Disponibilite[] $disponibilites
 * @property Collection|Formation[] $formations
 * @property Collection|Module[] $modules
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Pcharge[] $pcharges
 * @property Collection|Titre[] $titres
 *
 * @package App\Models
 */
class Demandeur extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'demandeurs';

	protected $casts = [
		'users_id' => 'int',
		'items_id' => 'int',
		'types_demandes_id' => 'int',
		'courriers_id' => 'int',
		'zones_id' => 'int',
		'localites_id' => 'int',
		'arrondissements_id' => 'int',
		'regions_id' => 'int',
		'departements_id' => 'int',
		'communes_id' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'cin',
		'numero_dossier',
		'statut',
		'type',
		'items1',
		'items2',
		'date1',
		'file1',
		'users_id',
		'items_id',
		'types_demandes_id',
		'courriers_id',
		'zones_id',
		'localites_id',
		'arrondissements_id',
		'regions_id',
		'departements_id',
		'communes_id'
	];

	public function arrondissement()
	{
		return $this->belongsTo(Arrondissement::class, 'arrondissements_id');
	}

	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id');
	}

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'departements_id');
	}

	public function item()
	{
		return $this->belongsTo(Item::class, 'items_id');
	}

	public function localite()
	{
		return $this->belongsTo(Localite::class, 'localites_id');
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id');
	}

	public function types_demande()
	{
		return $this->belongsTo(TypesDemande::class, 'types_demandes_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function zone()
	{
		return $this->belongsTo(Zone::class, 'zones_id');
	}

	public function collectives()
	{
		return $this->hasMany(Collective::class, 'demandeurs_id');
	}

	public function commentaires()
	{
		return $this->hasMany(Commentaire::class, 'demandeurs_id');
	}

	public function disponibilites()
	{
		return $this->belongsToMany(Disponibilite::class, 'demandeursdisponibilites', 'demandeurs_id', 'disponibilites_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->belongsToMany(Formation::class, 'demandeursformations', 'demandeurs_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'demandeursmodules', 'demandeurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'demandeurs_id');
	}

	public function pcharges()
	{
		return $this->hasMany(Pcharge::class, 'demandeurs_id');
	}

	public function titres()
	{
		return $this->hasMany(Titre::class, 'demandeurs_id');
	}
}
