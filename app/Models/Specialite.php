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
 * Class Specialite
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $sigle
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
class Specialite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'specialites';

	protected $fillable = [
		'uuid',
		'name',
		'sigle'
	];

	public function formations()
	{
		return $this->hasMany(Formation::class, 'specialites_id');
	}

	public function modules()
	{
		return $this->hasMany(Module::class, 'specialites_id');
	}

	public function operateurs()
	{
		return $this->hasMany(Operateur::class, 'specialites_id');
	}
}
