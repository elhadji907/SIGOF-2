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
 * Class Pcharge
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $cin
 * @property int|null $annee
 * @property string|null $matricule
 * @property string|null $typedemande
 * @property string|null $niveau
 * @property Carbon|null $date1
 * @property Carbon|null $date_depot
 * @property float|null $inscription
 * @property float|null $montant
 * @property float|null $accompt
 * @property float|null $reliquat
 * @property string|null $niveauentree
 * @property string|null $niveausortie
 * @property string|null $specialisation
 * @property string|null $statut
 * @property string|null $motivation
 * @property string|null $adresse
 * @property string|null $telephone
 * @property string|null $avis_dg
 * @property int|null $duree
 * @property int|null $nbre_pieces
 * @property string|null $file1
 * @property string|null $file2
 * @property string|null $file3
 * @property string|null $file4
 * @property string|null $file5
 * @property string|null $file6
 * @property string|null $file7
 * @property string|null $file8
 * @property int|null $demandeurs_id
 * @property int|null $etablissements_id
 * @property int|null $filieres_id
 * @property int|null $communes_id
 * @property int|null $scolarites_id
 * @property int|null $etudes_id
 * @property int|null $typepcharges_id
 * @property int|null $diplomes_id
 * @property int|null $diplomespros_id
 * @property string|null $optiondiplome
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Demandeur|null $demandeur
 * @property Commune|null $commune
 * @property Diplome|null $diplome
 * @property Diplomespro|null $diplomespro
 * @property Etablissement|null $etablissement
 * @property Etude|null $etude
 * @property Filiere|null $filiere
 * @property Scolarite|null $scolarite
 * @property Typepcharge|null $typepcharge
 * @property Collection|Nouvelle[] $nouvelles
 * @property Collection|Renouvellement[] $renouvellements
 *
 * @package App\Models
 */
class Pcharge extends Model
{

	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'pcharges';

	protected $casts = [
		'annee' => 'int',
		'inscription' => 'float',
		'montant' => 'float',
		'accompt' => 'float',
		'reliquat' => 'float',
		'duree' => 'int',
		'nbre_pieces' => 'int',
		'demandeurs_id' => 'int',
		'etablissements_id' => 'int',
		'filieres_id' => 'int',
		'communes_id' => 'int',
		'scolarites_id' => 'int',
		'etudes_id' => 'int',
		'typepcharges_id' => 'int',
		'diplomes_id' => 'int',
		'users_id' => 'int',
		'diplomespros_id' => 'int'
	];

	protected $dates = [
		'date1',
		'date_depot'
	];

	protected $fillable = [
		'uuid',
		'cin',
		'annee',
		'matricule',
		'typedemande',
		'niveau',
		'date1',
		'date_depot',
		'inscription',
		'montant',
		'accompt',
		'reliquat',
		'niveauentree',
		'niveausortie',
		'specialisation',
		'statut',
		'motivation',
		'adresse',
		'telephone',
		'avis_dg',
		'duree',
		'nbre_pieces',
		'file1',
		'file2',
		'file3',
		'file4',
		'file5',
		'file6',
		'file7',
		'file8',
		'demandeurs_id',
		'etablissements_id',
		'filieres_id',
		'communes_id',
		'scolarites_id',
		'etudes_id',
		'typepcharges_id',
		'diplomes_id',
		'diplomespros_id',
		'users_id',
		'optiondiplome'
	];

	public function demandeur()
	{
		return $this->belongsTo(Demandeur::class, 'demandeurs_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id');
	}

	public function diplome()
	{
		return $this->belongsTo(Diplome::class, 'diplomes_id');
	}

	public function diplomespro()
	{
		return $this->belongsTo(Diplomespro::class, 'diplomespros_id');
	}

	public function etablissement()
	{
		return $this->belongsTo(Etablissement::class, 'etablissements_id');
	}

	public function etude()
	{
		return $this->belongsTo(Etude::class, 'etudes_id');
	}

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieres_id');
	}

	public function scolarite()
	{
		return $this->belongsTo(Scolarite::class, 'scolarites_id');
	}

	public function typepcharge()
	{
		return $this->belongsTo(Typepcharge::class, 'typepcharges_id');
	}

	public function nouvelles()
	{
		return $this->hasMany(Nouvelle::class, 'pcharges_id');
	}

	public function renouvellements()
	{
		return $this->hasMany(Renouvellement::class, 'pcharges_id');
	}

	public function files()
	{
		return $this->hasMany(File::class, 'users_id')->latest();
	}
}
