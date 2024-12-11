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
 * Class Moduleoperateurstatut
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $statut
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Modulesoperateur[] $modulesoperateurs
 *
 * @package App\Models
 */
class Moduleoperateurstatut extends Model
{

	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'moduleoperateurstatut';
	protected $casts = [
		'operateurmodules_id',
		'validated_id'
	];
	protected $fillable = [
		'uuid',
		'statut',
		'motif',
		'operateurmodules_id',
		'validated_id'
	];

	public function modulesoperateurs()
	{
		return $this->hasMany(Modulesoperateur::class);
	}

	public function operateurmodule()
	{
		return $this->belongsTo(Operateurmodule::class, 'operateurmodules_id');
	}
}
