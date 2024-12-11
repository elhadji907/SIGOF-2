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
 * Class Etude
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Collective[] $collectives
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Pcharge[] $pcharges
 *
 * @package App\Models
 */
class Etude extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'etudes';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function collectives()
	{
		return $this->hasMany(Collective::class, 'etudes_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'etudes_id');
	}

	public function pcharges()
	{
		return $this->hasMany(Pcharge::class, 'etudes_id');
	}
}
