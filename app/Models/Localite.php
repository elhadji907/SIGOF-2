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
 * Class Localite
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $nom
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Demandeur[] $demandeurs
 * @property Collection|Formation[] $formations
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Programme[] $programmes
 * @property Collection|Projet[] $projets
 * @property Collection|Zone[] $zones
 *
 * @package App\Models
 */
class Localite extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'localites';

	protected $fillable = [
		'uuid',
		'nom'
	];

	public function demandeurs()
	{
		return $this->hasMany(Demandeur::class, 'localites_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'localites_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'localites_id');
	}

	public function programmes()
	{
		return $this->belongsToMany(Programme::class, 'programmeslocalites', 'localites_id', 'programmes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function projets()
	{
		return $this->belongsToMany(Projet::class, 'projetslocalites', 'localites_id', 'projets_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function zones()
	{
		return $this->hasMany(Zone::class, 'localites_id');
	}
}
