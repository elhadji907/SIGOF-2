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
 * Class Employee
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string|null $adresse
 * @property Carbon|null $date_embauche
 * @property string|null $classification
 * @property string|null $categorie_salaire
 * @property int $users_id
 * @property int|null $categories_id
 * @property int|null $fonctions_id
 * @property int|null $nomminations_id
 * @property int|null $decisions_id
 * @property int|null $procesverbals_id
 * @property int|null $directions_id
 * @property string|null $dirrection_employee
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category|null $category
 * @property Direction|null $direction
 * @property Fonction|null $fonction
 * @property Nommination|null $nommination
 * @property Decision|null $decision
 * @property Procesverbal|null $procesverbals
 * @property User $user
 * @property Collection|Charge[] $charges
 * @property Collection|Conger[] $congers
 * @property Collection|Dossier[] $dossiers
 * @property Collection|Courrier[] $courriers
 * @property Collection|Formation[] $formations
 * @property Collection|Imputation[] $imputations
 * @property Collection|Famille[] $familles
 * @property Collection|Mission[] $missions
 * @property Collection|OrdresMission[] $ordres_missions
 * @property Collection|Prestataire[] $prestataires
 * @property Collection|Salaire[] $salaires
 * @property Collection|Sorty[] $sorties
 * @property Collection|Stagiaire[] $stagiaires
 *
 * @package App\Models
 */
class Employee extends Model
{
	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'employees';

	protected $casts = [
		'users_id' => 'int',
		'categories_id' => 'int',
		'fonctions_id' => 'int',
		'directions_id' => 'int',
		'date_embauche' => 'datetime'
	];

	protected $dates = [
		'date_embauche'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'adresse',
		'date_embauche',
		'classification',
		'categorie_salaire',
		'bureau',
		'poste',
		'users_id',
		'categories_id',
		'fonctions_id',
		'directions_id',
		'dirrection_employee',
		'indemnite_fonction',
		'fonction_occupee',
		'indemnite_fonction',
		'fonction_precedente',
		'diplome',
		'autres_diplomes'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'categories_id');
	}

	public function direction()
	{
		return $this->belongsTo(Direction::class, 'directions_id');
	}

	public function fonction()
	{
		return $this->belongsTo(Fonction::class, 'fonctions_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function charges()
	{
		return $this->hasMany(Charge::class, 'employees_id');
	}

	public function congers()
	{
		return $this->hasMany(Conger::class, 'employees_id');
	}

	public function dossiers()
	{
		return $this->hasMany(Dossier::class, 'employees_id');
	}

	public function courriers()
	{
		return $this->belongsToMany(Courrier::class, 'employeescourriers', 'employees_id', 'courriers_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function arrives()
	{
		return $this->belongsToMany(Arrive::class, 'courrierarrivesemployes', 'employees_id', 'arrives_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function lois()
	{
		return $this->belongsToMany(Loi::class, 'employeslois', 'employes_id', 'lois_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function decrets()
	{
		return $this->belongsToMany(Decret::class, 'employesdecrets', 'employes_id', 'decrets_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function procesverbals()
	{
		return $this->belongsToMany(Procesverbal::class, 'employesprocesverbals', 'employes_id', 'procesverbals_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function decisions()
	{
		return $this->belongsToMany(Decision::class, 'employesdecisions', 'employes_id', 'decisions_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function articles()
	{
		return $this->belongsToMany(Article::class, 'employesarticles', 'employes_id', 'articles_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}
	public function nomminations()
	{
		return $this->belongsToMany(Nommination::class, 'employesnomminations', 'employes_id', 'nomminations_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}
	public function indemnites()
	{
		return $this->belongsToMany(Indemnite::class, 'employesindemnites', 'employes_id', 'indemnites_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function formations()
	{
		return $this->belongsToMany(Formation::class, 'employeesformations', 'employees_id', 'formations_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

	public function imputations()
	{
		return $this->belongsToMany(Imputation::class, 'employeesimputations', 'employees_id', 'imputations_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}


	/* 	public function lois()
	{
		return $this->belongsToMany(Loi::class, 'employeslois');
	} */

	public function familles()
	{
		return $this->hasMany(Famille::class, 'employees_id');
	}

	public function missions()
	{
		return $this->hasMany(Mission::class, 'employees_id');
	}

	public function ordres_missions()
	{
		return $this->hasMany(OrdresMission::class, 'employees_id');
	}

	public function prestataires()
	{
		return $this->hasMany(Prestataire::class, 'employees_id');
	}

	public function salaires()
	{
		return $this->hasMany(Salaire::class, 'employees_id');
	}

	public function sorties()
	{
		return $this->hasMany(Sorty::class, 'employees_id');
	}

	public function stagiaires()
	{
		return $this->hasMany(Stagiaire::class, 'employees_id');
	}

	public function chef()
	{
		return $this->belongsTo(Direction::class, 'chef_id');
	}
}
