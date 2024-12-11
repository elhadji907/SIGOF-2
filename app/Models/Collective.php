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
 * Class Collective
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string|null $statut_demande
 * @property string|null $users_id
 * @property string|null $email
 * @property string|null $email_responsable
 * @property string|null $civilite_responsable
 * @property string|null $prenom_responsable
 * @property string|null $nom_responsable
 * @property string|null $fonction_responsable
 * @property string|null $name
 * @property string|null $sigle
 * @property Carbon|null $date_depot
 * @property string|null $items1
 * @property Carbon|null $date1
 * @property string|null $statut
 * @property string|null $description
 * @property string|null $type
 * @property string|null $adresse
 * @property string|null $telephone
 * @property string|null $fixe
 * @property string|null $bp
 * @property string|null $fax
 * @property string|null $projetprofessionnel
 * @property string|null $experience
 * @property string|null $prerequis
 * @property string|null $motivation
 * @property int|null $nbre_pieces
 * @property string|null $file1
 * @property string|null $file2
 * @property string|null $file3
 * @property string|null $legende_recipice
 * @property string|null $file_recipice
 * @property int $demandeurs_id
 * @property int|null $ingenieurs_id
 * @property int|null $formations_id
 * @property int|null $communes_id
 * @property int|null $etudes_id
 * @property int|null $antennes_id
 * @property int|null $programmes_id
 * @property int|null $projets_id
 * @property int|null $conventions_id
 * @property int|null $fcollectives_id
 * @property int $modules_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Antenne|null $antenne
 * @property Commune|null $commune
 * @property Convention|null $convention
 * @property Demandeur $demandeur
 * @property Etude|null $etude
 * @property Fcollective|null $fcollective
 * @property Ingenieur|null $ingenieur
 * @property Formation|null $formation
 * @property Module $module
 * @property Programme|null $programme
 * @property Projet|null $projet
 * @property Collection|Programme[] $programmes
 * @property Collection|Listecollective[] $listecollectives
 * @property Collection|Projet[] $projets
 * @property Collection|Membre[] $membres
 * @property Collection|Formation[] $formations
 *
 * @package App\Models
 */
class Collective extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'collectives';

	protected $casts = [
		'nbre_pieces' => 'int',
		'demandeurs_id' => 'int',
		'ingenieurs_id' => 'int',
		'formations_id' => 'int',
		'communes_id' => 'int',
		'departements_id' => 'int',
		'regions_id' => 'int',
		'etudes_id' => 'int',
		'antennes_id' => 'int',
		'programmes_id' => 'int',
		'projets_id' => 'int',
		'conventions_id' => 'int',
		'fcollectives_id' => 'int',
		'users_id' => 'int',
		'modules_id' => 'int',
	];

	protected $dates = [
		'date_depot',
		'date1'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'sigle',
		'date_depot',
		'items1',
		'date1',
		'statut_demande',
		'validated_by',
		'statut_juridique',
		'autre_statut_juridique',
		'description',
		'type',
		'adresse',
		'telephone',
		'fixe',
		'bp',
		'fax',
		'projetprofessionnel',
		'civilite_responsable',
		'nom_responsable',
		'prenom_responsable',
		'cin_responsable',
		'telephone_responsable',
		'email',
		'email_responsable',
		'fonction_responsable',
		'experience',
		'prerequis',
		'motivation',
		'nbre_pieces',
		'file1',
		'file2',
		'file3',
		'legende_recipice',
		'file_recipice',
		'demandeurs_id',
		'ingenieurs_id',
		'formations_id',
		'communes_id',
		'departements_id',
		'regions_id',
		'etudes_id',
		'antennes_id',
		'programmes_id',
		'projets_id',
		'conventions_id',
		'fcollectives_id',
		'users_id',
		'modules_id'
	];

	public function formations()
	{
		return $this->hasMany(Formation::class, 'modules_id');
	}

	public function collectivemodules()
	{
		return $this->hasMany(Collectivemodule::class, 'collectives_id');
	}
	
	public function listecollectives()
	{
		return $this->hasMany(Listecollective::class, 'collectives_id');
	}
	public function antenne()
	{
		return $this->belongsTo(Antenne::class, 'antennes_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id');
	}

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'departements_id');
	}
	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id');
	}
	public function convention()
	{
		return $this->belongsTo(Convention::class, 'conventions_id');
	}

	public function demandeur()
	{
		return $this->belongsTo(Demandeur::class, 'demandeurs_id');
	}

	public function etude()
	{
		return $this->belongsTo(Etude::class, 'etudes_id');
	}

	public function fcollective()
	{
		return $this->belongsTo(Fcollective::class, 'fcollectives_id');
	}

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}

	public function ingenieur()
	{
		return $this->belongsTo(Ingenieur::class, 'ingenieurs_id');
	}

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id');
	}

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}

	public function programmes()
	{
		return $this->belongsToMany(Programme::class, 'collectivesprogrammes', 'collectives_id', 'programmes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function projets()
	{
		return $this->belongsToMany(Projet::class, 'collectivesprojets', 'collectives_id', 'projets_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function membres()
	{
		return $this->hasMany(Membre::class, 'collectives_id');
	}
}
