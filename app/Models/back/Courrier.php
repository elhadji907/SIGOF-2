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
 * Class Courrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string|null $objet
 * @property string|null $expediteur
 * @property string|null $name
 * @property string|null $type
 * @property string|null $description
 * @property string|null $message
 * @property string|null $email
 * @property string|null $fax
 * @property string|null $bp
 * @property string|null $telephone
 * @property string|null $file
 * @property string|null $legende
 * @property string|null $statut
 * @property Carbon|null $date
 * @property string|null $adresse
 * @property Carbon|null $date_imp
 * @property Carbon|null $date_recep
 * @property Carbon|null $date_cores
 * @property Carbon|null $date_rejet
 * @property Carbon|null $date_liq
 * @property string|null $designation
 * @property string|null $observation
 * @property Carbon|null $date_visa
 * @property Carbon|null $date_mandat
 * @property float|null $tva
 * @property float|null $ir
 * @property string|null $nb_pc
 * @property string|null $destinataire
 * @property Carbon|null $date_paye
 * @property int|null $num_bord
 * @property float|null $montant
 * @property float|null $autres_montant
 * @property float|null $total
 * @property int|null $users_id
 * @property int|null $types_courriers_id
 * @property int|null $projets_id
 * @property int|null $traitementcourriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Projet|null $projet
 * @property Traitementcourrier|null $traitementcourrier
 * @property TypesCourrier|null $types_courrier
 * @property User|null $user
 * @property Collection|Agrement[] $agrements
 * @property Collection|Banque[] $banques
 * @property Collection|Bordereau[] $bordereaus
 * @property Collection|Comment[] $comments
 * @property Collection|Imputation[] $imputations
 * @property Collection|Demandeur[] $demandeurs
 * @property Collection|Depart[] $departs
 * @property Collection|Direction[] $directions
 * @property Collection|Employee[] $employees
 * @property Collection|Etat[] $etats
 * @property Collection|EtatsPrevi[] $etats_previs
 * @property Collection|Facturesdaf[] $facturesdafs
 * @property Collection|Fad[] $fads
 * @property Collection|Formation[] $formations
 * @property Collection|Interne[] $internes
 * @property Collection|Mission[] $missions
 * @property Collection|Operateur[] $operateurs
 * @property Collection|OrdresMission[] $ordres_missions
 * @property Collection|Recue[] $recues
 * @property Collection|Tresor[] $tresors
 *
 * @package App\Models
 */
class Courrier extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'courriers';

	protected $casts = [
		'tva' => 'float',
		'ir' => 'float',
		'montant' => 'float',
		'autres_montant' => 'float',
		'total' => 'float',
		'users_id' => 'int',
		'types_courriers_id' => 'int',
		'projets_id' => 'int',
		'traitementcourriers_id' => 'int'
	];

	protected $dates = [
		'date',
		'date_imp',
		'date_recep',
		'date_cores',
		'date_rejet',
		'date_liq',
		'date_visa',
		'date_mandat',
		'date_paye'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'num_bord',
		'objet',
		'expediteur',
		'name',
		'type',
		'description',
		'reference',
		'message',
		'email',
		'fax',
		'bp',
		'telephone',
		'file',
		'legende',
		'statut',
		'date',
		'adresse',
		'date_imp',
		'date_depart',
		'date_recep',
		'date_cores',
		'date_rejet',
		'date_liq',
		'designation',
		'observation',
		'date_visa',
		'date_mandat',
		'tva',
		'ir',
		'nb_pc',
		'destinataire',
		'date_paye',
		'num_bord',
		'montant',
		'autres_montant',
		'total',
		'users_id',
		'types_courriers_id',
		'projets_id',
		'traitementcourriers_id'
	];

	public function getFile(){
		$filePath = $this->file ?? 'recues/default.jpg';
		return "/storage/" . $filePath;
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}

	public function traitementcourrier()
	{
		return $this->belongsTo(Traitementcourrier::class, 'traitementcourriers_id');
	}

	public function types_courrier()
	{
		return $this->belongsTo(TypesCourrier::class, 'types_courriers_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(Agrement::class, 'courriers_id');
	}

	public function banques()
	{
		return $this->hasMany(Banque::class, 'courriers_id');
	}

	public function bordereaus()
	{
		return $this->hasMany(Bordereau::class, 'courriers_id');
	}

	public function comments()
	{
		return $this->morphMany(Comment::class, 'commentable')->latest();
	}

	public function imputations()
	{
		return $this->belongsToMany(Imputation::class, 'courriersimputations', 'courriers_id', 'imputations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function demandeurs()
	{
		return $this->hasMany(Demandeur::class, 'courriers_id');
	}

	public function departs()
	{
		return $this->hasMany(Depart::class, 'courriers_id');
	}

	public function directions()
	{
		return $this->belongsToMany(Direction::class, 'directionscourriers', 'courriers_id', 'directions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function employees()
	{
		return $this->belongsToMany(Employee::class, 'employeescourriers', 'courriers_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function etats()
	{
		return $this->hasMany(Etat::class, 'courriers_id');
	}

	public function etats_previs()
	{
		return $this->hasMany(EtatsPrevi::class, 'courriers_id');
	}

	public function facturesdafs()
	{
		return $this->hasMany(Facturesdaf::class, 'courriers_id');
	}

	public function fads()
	{
		return $this->hasMany(Fad::class, 'courriers_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'courriers_id');
	}

	public function internes()
	{
		return $this->hasMany(Interne::class, 'courriers_id');
	}

	public function missions()
	{
		return $this->hasMany(Mission::class, 'courriers_id');
	}

	public function operateurs()
	{
		return $this->hasMany(Operateur::class, 'courriers_id');
	}

	public function ordres_missions()
	{
		return $this->hasMany(OrdresMission::class, 'courriers_id');
	}

	public function recues()
	{
		return $this->hasMany(Recue::class, 'courriers_id');
	}

	public function tresors()
	{
		return $this->hasMany(Tresor::class, 'courriers_id');
	}
}
