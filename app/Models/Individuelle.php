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
 * Class Individuelle
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string|null $users_id
 * @property string|null $experience
 * @property string|null $projetprofessionnel
 * @property string|null $prerequis
 * @property string|null $information
 * @property Carbon|null $date_depot
 * @property float|null $note
 * @property string|null $statut
 * @property string|null $type
 * @property string|null $qualification
 * @property string|null $etablissement
 * @property string|null $adresse
 * @property string|null $option
 * @property string|null $autres_diplomes
 * @property string|null $autres_diplomes_pros
 * @property string|null $telephone
 * @property string|null $motivation
 * @property string|null $motif
 * @property int|null $annee_diplome
 * @property int|null $annee_diplome_professionelle
 * @property int|null $nbre_enfant
 * @property string|null $activite_travail
 * @property string|null $travail_renumeration
 * @property string|null $activite_avenir
 * @property string|null $handicap
 * @property string|null $situation_economique
 * @property string|null $victime_social
 * @property string|null $autre_victime
 * @property string|null $salaire
 * @property string|null $preciser_handicap
 * @property string|null $optiondiplome
 * @property string|null $dossier
 * @property string|null $autre_diplomes_fournis
 * @property string|null $items1
 * @property Carbon|null $date1
 * @property string|null $item1
 * @property string|null $item2
 * @property string|null $file1
 * @property string|null $file2
 * @property string|null $file3
 * @property string|null $file4
 * @property string|null $attestation
 * @property string|null $suivi
 * @property string|null $informations_suivi
 * @property int|null $nbre_pieces
 * @property int|null $nbre_enfants
 * @property float|null $note_obtenue
 * @property string|null $niveau_maitrise
 * @property string|null $observations
 * @property string|null $appreciation
 * @property string|null $motif_rejet
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property int $demandeurs_id
 * @property int|null $etudes_id
 * @property int|null $antennes_id
 * @property int|null $diplomes_id
 * @property int|null $conventions_id
 * @property int|null $diplomespros_id
 * @property int $modules_id
 * @property int|null $formations_id
 * @property int|null $zones_id
 * @property int|null $localites_id
 * @property int|null $projets_id
 * @property int|null $programmes_id
 * @property int|null $communes_id
 * @property int|null $arrondissements_id
 * @property int|null $departements_id
 * @property int|null $regions_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Antenne|null $antenne
 * @property Arrondissement|null $arrondissement
 * @property Commune|null $commune
 * @property Convention|null $convention
 * @property User|null $user
 * @property Demandeur $demandeur
 * @property Departement|null $departement
 * @property Diplome|null $diplome
 * @property Diplomespro|null $diplomespro
 * @property Etude|null $etude
 * @property Formation|null $formation
 * @property Localite|null $localite
 * @property Module $module
 * @property Programme|null $programme
 * @property Projet|null $projet
 * @property Region|null $region
 * @property Zone|null $zone
 *
 * @package App\Models
 */
class Individuelle extends Model
{
	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'individuelles';

	protected $casts = [
		'note' => 'float',
		'annee_diplome' => 'int',
		'annee_diplome_professionelle' => 'int',
		'nbre_enfant' => 'int',
		'nbre_pieces' => 'int',
		'nbre_enfants' => 'int',
		'note_obtenue' => 'float',
		'demandeurs_id' => 'int',
		'etudes_id' => 'int',
		'antennes_id' => 'int',
		'diplomes_id' => 'int',
		'conventions_id' => 'int',
		'diplomespros_id' => 'int',
		'modules_id' => 'int',
		'formations_id' => 'int',
		'zones_id' => 'int',
		'localites_id' => 'int',
		'projets_id' => 'int',
		'programmes_id' => 'int',
		'communes_id' => 'int',
		'arrondissements_id' => 'int',
		'departements_id' => 'int',
		'users_id' => 'int',
		'regions_id' => 'int'
	];

	protected $dates = [
		'date_depot',
		'date1'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'experience',
		'projetprofessionnel',
		'prerequis',
		'information',
		'date_depot',
		'note',
		'statut',
		'type',
		'qualification',
		'niveau_etude',
		'diplome_academique',
		'autre_diplome_academique',
		'option_diplome_academique',
		'etablissement_academique',
		'diplome_professionnel',
		'autre_diplome_professionnel',
		'specialite_diplome_professionnel',
		'etablissement_professionnel',
		'projet_poste_formation',
		'etablissement',
		'adresse',
		'option',
		'autres_diplomes',
		'autres_diplomes_pros',
		'telephone',
		'motivation',
		'motif',
		'annee_diplome',
		'annee_diplome_professionelle',
		'nbre_enfant',
		'activite_travail',
		'travail_renumeration',
		'activite_avenir',
		'handicap',
		'situation_economique',
		'victime_social',
		'autre_victime',
		'salaire',
		'preciser_handicap',
		'optiondiplome',
		'dossier',
		'autre_diplomes_fournis',
		'items1',
		'date1',
		'item1',
		'item2',
		'file1',
		'file2',
		'file3',
		'file4',
		'attestation',
		'suivi',
		'informations_suivi',
		'nbre_pieces',
		'autre_module',
		'nbre_enfants',
		'note_obtenue',
		'niveau_maitrise',
		'observations',
		'appreciation',
		'motif_rejet',
		'created_by',
		'updated_by',
		'deleted_by',
		'validated_by',
		'canceled_by',
		'demandeurs_id',
		'etudes_id',
		'antennes_id',
		'diplomes_id',
		'conventions_id',
		'diplomespros_id',
		'modules_id',
		'formations_id',
		'zones_id',
		'localites_id',
		'projets_id',
		'programmes_id',
		'communes_id',
		'arrondissements_id',
		'departements_id',
		'users_id',
		'retrait_diplome',
		'diplome_retirer_by',
		'regions_id'
	];

	
	public function validationindividuelles()
	{
		return $this->hasMany(Validationindividuelle::class, 'individuelles_id')->latest();
	}

	public function indisponibles()
	{
		return $this->hasMany(Indisponible::class, 'individuelles_id')->latest();
	}

	public function antenne()
	{
		return $this->belongsTo(Antenne::class, 'antennes_id')->latest();
	}

	public function arrondissement()
	{
		return $this->belongsTo(Arrondissement::class, 'arrondissements_id')->latest();
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id')->latest();
	}
	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id')->latest();
	}

	public function convention()
	{
		return $this->belongsTo(Convention::class, 'conventions_id')->latest();
	}

	public function demandeur()
	{
		return $this->belongsTo(Demandeur::class, 'demandeurs_id')->latest();
	}

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'departements_id')->latest();
	}

	public function diplome()
	{
		return $this->belongsTo(Diplome::class, 'diplomes_id')->latest();
	}

	public function diplomespro()
	{
		return $this->belongsTo(Diplomespro::class, 'diplomespros_id')->latest();
	}

	public function etude()
	{
		return $this->belongsTo(Etude::class, 'etudes_id')->latest();
	}

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id')->latest();
	}

	public function localite()
	{
		return $this->belongsTo(Localite::class, 'localites_id')->latest();
	}

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id')->latest();
	}

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id')->latest();
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id')->latest();
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id')->latest();
	}

	public function zone()
	{
		return $this->belongsTo(Zone::class, 'zones_id')->latest();
	}
}
