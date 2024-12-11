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
 * Class Operateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero_agrement
 * @property Carbon|null $date_depot
 * @property Carbon|null $annee_agrement
 * @property string|null $session_agrement
 * @property Carbon|null $date
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_fin
 * @property Carbon|null $date_renew
 * @property string|null $quitus
 * @property Carbon|null $debut_quitus
 * @property Carbon|null $fin_quitus
 * @property string|null $nom_responsable
 * @property string|null $prenom_responsable
 * @property string|null $cin_responsable
 * @property string|null $telephone_responsable
 * @property string|null $email_responsable
 * @property string|null $fonction_responsable
 * @property string|null $statut_agrement
 * @property string|null $statut
 * @property string|null $motif
 * @property int|null $users_id
 * @property int|null $rccms_id
 * @property int|null $nineas_id
 * @property int|null $types_operateurs_id
 * @property int|null $specialites_id
 * @property int|null $courriers_id
 * @property int|null $communes_id
 * @property int|null $commissionagrements_id
 * @property string|null $observations
 * @property string|null $visite_conformite
 * @property string|null $numero_dossier
 * @property string|null $numero_arrive
 * @property string|null $arrete_creation
 * @property string|null $file_arrete_creation
 * @property string|null $demande_signe
 * @property string|null $formulaire_signe
 * @property string|null $quitusfiscal
 * @property string|null $cvsigne
 * @property string|null $file8
 * @property string|null $file9
 * @property string|null $file10
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Commune|null $commune
 * @property Courrier|null $courrier
 * @property Specialite|null $specialite
 * @property TypesOperateur|null $types_operateur
 * @property User|null $user
 * @property Collection|Agrement[] $agrements
 * @property Collection|Operateurmodule[] $operateurmodules
 * @property Collection|Commentere[] $commenteres
 * @property Collection|Formation[] $formations
 * @property Collection|Module[] $modules
 * @property Collection|Niveaux[] $niveauxes
 * @property Collection|Region[] $regions
 * @property Collection|Traitement[] $traitements
 *
 * @package App\Models
 */
class Operateur extends Model
{
	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'operateurs';

	protected $casts = [
		'users_id' => 'int',
		'rccms_id' => 'int',
		'nineas_id' => 'int',
		'types_operateurs_id' => 'int',
		'specialites_id' => 'int',
		'courriers_id' => 'int',
		'communes_id' => 'int',
		'departements_id' => 'int',
		'regions_id' => 'int',
		'commissionagrements_id' => 'int',
		'fin_quitus' => 'datetime',
		'debut_quitus' => 'datetime',
		'annee_agrement' => 'datetime'
	];

	protected $dates = [
		'date_depot',
		'annee_agrement',
		'date',
		'date_debut',
		'date_fin',
		'date_renew',
		'debut_quitus',
		'fin_quitus'
	];

	protected $fillable = [
		'uuid',
		'numero_agrement',
		'date_depot',
		'annee_agrement',
		'session_agrement',
		'date',
		'date_debut',
		'date_fin',
		'date_renew',
		'quitus',
		'debut_quitus',
		'fin_quitus',
		/* 'civilite_responsable',
		'nom_responsable',
		'prenom_responsable',
		'cin_responsable',
		'telephone_responsable',
		'email_responsable',
		'fonction_responsable', */
		'statut_agrement',
		'statut',
		'autre_statut',
		'bp',
		'web',
		'motif',
		'type_demande',
		'users_id',
		'rccms_id',
		'nineas_id',
		'types_operateurs_id',
		'specialites_id',
		'courriers_id',
		'communes_id',
		'departements_id',
		'regions_id',
		'commissionagrements_id',
		'observations',
		'visite_conformite',
		'numero_dossier',
		'numero_arrive',
		'arrete_creation',
		'file_arrete_creation',
		'demande_signe',
		'formulaire_signe',
		'quitusfiscal',
		'cvsigne',
		'file8',
		'file9',
		'file10'
	];

	public function getQuitus()
	{
		$quitusPath = $this->quitus;
		return "/storage/" . $quitusPath;
	}

	public function getArreteCreation()
	{
		$arretePath = $this->file_arrete_creation;
		return "/storage/" . $arretePath;
	}

	public function historiqueagrements()
	{
		return $this->hasMany(Historiqueagrement::class, 'historiqueagrements_id')->latest();
	}

	public function validationoperateurs()
	{
		return $this->hasMany(Validationoperateur::class, 'validationoperateurs_id')->latest();
	}

	public function operateurmodules()
	{
		return $this->hasMany(Operateurmodule::class, 'operateurs_id')->latest();
	}

	public function operateurequipements()
	{
		return $this->hasMany(Operateurequipement::class, 'operateurs_id')->latest();
	}

	public function operateureferences()
	{
		return $this->hasMany(Operateureference::class, 'operateurs_id')->latest();
	}

	public function operateurformateurs()
	{
		return $this->hasMany(Operateurformateur::class, 'operateurs_id')->latest();
	}

	public function operateurlocalites()
	{
		return $this->hasMany(Operateurlocalite::class, 'operateurs_id')->latest();
	}

	public function operateurzones()
	{
		return $this->hasMany(Operateurzone::class, 'operateurs_id')->latest();
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

	public function commissionagrement()
	{
		return $this->belongsTo(Commissionagrement::class, 'commissionagrements_id')->latest();
	}

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function ninea()
	{
		return $this->belongsTo(Ninea::class, 'nineas_id');
	}

	public function rccm()
	{
		return $this->belongsTo(Rccm::class, 'rccms_id');
	}

	public function specialite()
	{
		return $this->belongsTo(Specialite::class, 'specialites_id');
	}

	public function types_operateur()
	{
		return $this->belongsTo(TypesOperateur::class, 'types_operateurs_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(Agrement::class, 'operateurs_id');
	}

	public function commenteres()
	{
		return $this->hasMany(Commentere::class, 'operateurs_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'operateurs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'modulesoperateurs', 'operateurs_id', 'modules_id')
			->withPivot('id', 'moduleoperateurstatut_id', 'specialites', 'deleted_at')
			->withTimestamps();
	}

	public function niveauxes()
	{
		return $this->belongsToMany(Niveaux::class, 'operateursniveaux', 'operateurs_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function regions()
	{
		return $this->belongsToMany(Region::class, 'operateursregions', 'operateurs_id', 'regions_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}
	public function traitements()
	{
		return $this->hasMany(Traitement::class, 'operateurs_id');
	}

	public function files()
	{
		return $this->hasMany(File::class, 'users_id')->latest();
	}
}
