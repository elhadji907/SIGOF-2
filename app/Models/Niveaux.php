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
 * Class Niveaux
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Formation[] $formations
 * @property Collection|Module[] $modules
 * @property Collection|Operateur[] $operateurs
 *
 * @package App\Models
 */
class Niveaux extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'niveauxs';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function formations()
	{
		return $this->hasMany(Formation::class, 'niveauxs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'modulesniveauxs', 'niveauxs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(Operateur::class, 'operateursniveaux', 'niveaux_id', 'operateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
