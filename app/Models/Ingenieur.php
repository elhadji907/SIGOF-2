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
 * Class Ingenieur
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $matricule
 * @property string $name
 * @property string $initiale
 * @property string|null $telephone
 * @property string|null $email
 * @property string|null $fonction
 * @property string|null $specialite
 * @property Carbon|null $date
 * @property string|null $items1
 * @property string|null $items2
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Collective[] $collectives
 * @property Collection|Formation[] $formations
 * @property Collection|Programme[] $programmes
 * @property Collection|Projet[] $projets
 *
 * @package App\Models
 */
class Ingenieur extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'ingenieurs';

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'name',
		'initiale',
		'telephone',
		'email',
		'fonction',
		'specialite',
		'date',
		'items1',
	];

	public function collectives()
	{
		return $this->hasMany(Collective::class, 'ingenieurs_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'ingenieurs_id');
	}

	public function programmes()
	{
		return $this->hasMany(Programme::class, 'ingenieurs_id');
	}

	public function projets()
	{
		return $this->belongsToMany(Projet::class, 'projetsingenieurs', 'ingenieurs_id', 'projets_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
