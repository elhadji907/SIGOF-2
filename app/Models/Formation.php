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
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $code
 * @property string|null $annee
 * @property string|null $name
 * @property string|null $qualifications
 * @property string|null $effectif_total
 * @property Carbon|null $date_pv
 * @property Carbon|null $date_suivi
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_lettre
 * @property Carbon|null $date_convention
 * @property Carbon|null $date_fin
 * @property string|null $adresse
 * @property string|null $titre
 * @property string|null $attestation
 * @property float|null $frais_operateurs
 * @property float|null $frais_add
 * @property float|null $autes_frais
 * @property float|null $frais_total
 * @property string|null $suivi_dossier
 * @property string|null $lieu
 * @property string|null $convention_col
 * @property string|null $decret
 * @property string|null $beneficiaires
 * @property string|null $lettre_mission
 * @property string|null $membres_jury
 * @property string|null $type_formation
 * @property string|null $type_certification
 * @property int|null $effectif_prevu
 * @property int|null $prevue_h
 * @property int|null $prevue_f
 * @property int|null $forme_h
 * @property int|null $forme_f
 * @property int|null $total
 * @property string|null $appreciations
 * @property string|null $file_convention
 * @property string|null $detf_file
 * @property int|null $ingenieurs_id
 * @property int|null $onfpevaluateurs_id
 * @property int|null $evaluateurs_id
 * @property int|null $agents_id
 * @property int|null $detfs_id
 * @property int|null $conventions_id
 * @property int|null $referentiels_id
 * @property int|null $programmes_id
 * @property int|null $operateurs_id
 * @property int|null $traitements_id
 * @property int|null $niveauxs_id
 * @property int|null $specialites_id
 * @property int|null $courriers_id
 * @property int|null $statuts_id
 * @property int|null $types_formations_id
 * @property int|null $communes_id
 * @property int|null $antennes_id
 * @property int|null $projets_id
 * @property int|null $choixoperateurs_id
 * @property int|null $modules_id
 * @property int|null $collectivemodules_id
 * @property int|null $collectives_id
 * @property int|null $regions_id
 * @property int|null $departements_id
 * @property int|null $arrondissements_id
 * @property int|null $localites_id
 * @property int|null $zones_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agent|null $agent
 * @property Statut|null $statut
 * @property Antenne|null $antenne
 * @property Arrondissement|null $arrondissement
 * @property Choixoperateur|null $choixoperateur
 * @property Commune|null $commune
 * @property Convention|null $convention
 * @property Referentiel|null $referentiel
 * @property Courrier|null $courrier
 * @property Departement|null $departement
 * @property Detf|null $detf
 * @property Ingenieur|null $ingenieur
 * @property Onfpevaluateur|null $onfpevaluateur
 * @property Localite|null $localite
 * @property Module|null $module
 * @property Collectivemodule|null $collectivemodule
 * @property Collective|null $collective
 * @property Niveaux|null $niveaux
 * @property Operateur|null $operateur
 * @property Programme|null $programme
 * @property Projet|null $projet
 * @property Region|null $region
 * @property Specialite|null $specialite
 * @property Statut|null $statut
 * @property Traitement|null $traitement
 * @property TypesFormation|null $types_formation
 * @property Zone|null $zone
 * @property Evaluateur|null $evaluateur
 * @property Collection|Coment[] $coments
 * @property Collection|Demandeur[] $demandeurs
 * @property Collection|Detail[] $details
 * @property Collection|Employee[] $employees
 * @property Collection|Evaluation[] $evaluations
 * @property Collection|Facture[] $factures
 * @property Collection|Fcollective[] $fcollectives
 * @property Collection|Findividuelle[] $findividuelles
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Collectivemodule[] $collectivemodules
 * @property Collection|Individuelle[] $listecollectives
 *
 * @package App\Models
 */
class Formation extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'formations';

	protected $casts = [
		'frais_evaluation' => 'float',
		'frais_evaluateur' => 'float',
		'frais_operateurs' => 'float',
		'frais_add' => 'float',
		'autes_frais' => 'float',
		'frais_total' => 'float',
		'effectif_prevu' => 'int',
		'prevue_h' => 'int',
		'prevue_f' => 'int',
		'forme_h' => 'int',
		'forme_f' => 'int',
		'total' => 'int',
		'ingenieurs_id' => 'int',
		'onfpevaluateurs_id' => 'int',
		'evaluateurs_id' => 'int',
		'agents_id' => 'int',
		'detfs_id' => 'int',
		'conventions_id' => 'int',
		'referentiels_id' => 'int',
		'programmes_id' => 'int',
		'operateurs_id' => 'int',
		'traitements_id' => 'int',
		'niveauxs_id' => 'int',
		'specialites_id' => 'int',
		'courriers_id' => 'int',
		'statuts_id' => 'int',
		'types_formations_id' => 'int',
		'communes_id' => 'int',
		'antennes_id' => 'int',
		'projets_id' => 'int',
		'choixoperateurs_id' => 'int',
		'modules_id' => 'int',
		'collectivemodules_id' => 'int',
		/* 'collectives_id' => 'int', */
		'regions_id' => 'int',
		'departements_id' => 'int',
		'arrondissements_id' => 'int',
		'localites_id' => 'int',
		'zones_id' => 'int',
		'date_pv' => 'datetime',
		'date_suivi' => 'datetime',
		'date_debut' => 'datetime',
		'date_fin' => 'datetime',
		'date_convention' => 'datetime',
		'date_lettre' => 'datetime',
	];

	protected $dates = [
		'date_pv',
		'date_suivi',
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'code',
		'annee',
		'name',
		'qualifications',
		'effectif_total',
		'date_pv',
		'date_suivi',
		'date_debut',
		'date_fin',
		'adresse',
		'titre',
		'attestation',
		'frais_operateurs',
		'frais_evaluation',
		'frais_evaluateur',
		'frais_add',
		'autes_frais',
		'frais_total',
		'suivi_dossier',
		'lieu',
		'convention_col',
		'decret',
		'beneficiaires',
		'membres_jury',
		'lettre_mission',
		'type_certification',
		'effectif_prevu',
		'prevue_h',
		'prevue_f',
		'forme_h',
		'forme_f',
		'total',
		'statut',
		'categorie_professionnelle',
		'nbre_admis',
		'file1',
		'evaluateur_onfp',
		'numero_convention',
		'file_convention',
		'detf_file',
		'initiale_evaluateur_onfp',
		'type_certificat',
		'recommandations',
		'appreciations',
		'ingenieurs_id',
		'onfpevaluateurs_id',
		'evaluateurs_id',
		'agents_id',
		'detfs_id',
		'conventions_id',
		'referentiels_id',
		'programmes_id',
		'operateurs_id',
		'traitements_id',
		'niveauxs_id',
		'specialites_id',
		'courriers_id',
		'statuts_id',
		'types_formations_id',
		'communes_id',
		'antennes_id',
		'projets_id',
		'choixoperateurs_id',
		'modules_id',
		'collectivemodules_id',
		/* 'collectives_id', */
		'regions_id',
		'departements_id',
		'arrondissements_id',
		'localites_id',
		'zones_id',
		'date_convention',
		'date_lettre',
	];

	
	public function getFileConvention(){
		$filePath = $this->file_convention ?? '';
		return "/storage/" . $filePath;
	}
	
	public function getFileDetf(){
		$filePath = $this->detf_file ?? '';
		return "/storage/" . $filePath;
	}

	public function statuts()
	{
		return $this->hasMany(Statut::class, 'formations_id')->latest();
	}

	public function indisponibles()
	{
		return $this->hasMany(Indisponible::class, 'formations_id')->latest();
	}

	public function agent()
	{
		return $this->belongsTo(Agent::class, 'agents_id');
	}

	public function antenne()
	{
		return $this->belongsTo(Antenne::class, 'antennes_id');
	}

	public function arrondissement()
	{
		return $this->belongsTo(Arrondissement::class, 'arrondissements_id');
	}

	public function choixoperateur()
	{
		return $this->belongsTo(Choixoperateur::class, 'choixoperateurs_id');
	}

	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id');
	}

	public function convention()
	{
		return $this->belongsTo(Convention::class, 'conventions_id');
	}
	public function referentiel()
	{
		return $this->belongsTo(Referentiel::class, 'referentiels_id');
	}

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'departements_id');
	}

	public function detf()
	{
		return $this->belongsTo(Detf::class, 'detfs_id');
	}

	public function ingenieur()
	{
		return $this->belongsTo(Ingenieur::class, 'ingenieurs_id');
	}

	public function onfpevaluateur()
	{
		return $this->belongsTo(Onfpevaluateur::class, 'onfpevaluateurs_id');
	}

	public function evaluateur()
	{
		return $this->belongsTo(Evaluateur::class, 'evaluateurs_id');
	}

	public function localite()
	{
		return $this->belongsTo(Localite::class, 'localites_id');
	}

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id');
	}

	/* public function collectivemodule()
	{
		return $this->belongsTo(Collectivemodule::class, 'collectivemodules_id');
	} */

	/* public function collective()
	{
		return $this->belongsTo(Collective::class, 'collectives_id');
	} */

	public function niveaux()
	{
		return $this->belongsTo(Niveaux::class, 'niveauxs_id');
	}

	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id');
	}

	public function specialite()
	{
		return $this->belongsTo(Specialite::class, 'specialites_id');
	}

	/* public function statut()
	{
		return $this->belongsTo(Statut::class, 'statuts_id');
	} */

	public function traitement()
	{
		return $this->belongsTo(Traitement::class, 'traitements_id');
	}

	public function types_formation()
	{
		return $this->belongsTo(TypesFormation::class, 'types_formations_id');
	}

	public function zone()
	{
		return $this->belongsTo(Zone::class, 'zones_id');
	}

/* 	public function collectives()
	{
		return $this->hasMany(Collective::class, 'formations_id');
	}
 */
	public function coments()
	{
		return $this->hasMany(Coment::class, 'formations_id');
	}

	public function demandeurs()
	{
		return $this->belongsToMany(Demandeur::class, 'demandeursformations', 'formations_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function details()
	{
		return $this->hasMany(Detail::class, 'formations_id');
	}

	public function employees()
	{
		return $this->belongsToMany(Employee::class, 'employeesformations', 'formations_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function evaluations()
	{
		return $this->hasMany(Evaluation::class, 'formations_id');
	}

	public function factures()
	{
		return $this->hasMany(Facture::class, 'formations_id');
	}

	public function fcollectives()
	{
		return $this->hasMany(Fcollective::class, 'formations_id');
	}

	public function findividuelles()
	{
		return $this->hasMany(Findividuelle::class, 'formations_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'formations_id');
	}

	public function collectivemodule()
	{
		return $this->hasOne(Collectivemodule::class, 'formations_id');
	}

	public function collective()
	{
		return $this->hasOne(Collective::class, 'formations_id');
	}

	public function listecollectives()
	{
		return $this->hasMany(Listecollective::class, 'formations_id');
	}
}
