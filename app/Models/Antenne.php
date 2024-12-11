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
 * Class Antenne
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $code
 * @property string|null $chef_id
 * @property string|null $contact
 * @property string|null $adresse
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Region[] $regions
 * @property Collection|Collective[] $collectives
 * @property Collection|Formation[] $formations
 * @property Collection|Individuelle[] $individuelles
 *
 * @package App\Models
 */
class Antenne extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'antennes';
	protected $casts = [
		'chef_id' => 'int',
	];

	protected $fillable = [
		'uuid',
		'name',
		'code',
		'contact',
		'adresse',
		'chef_id',
	];

	public function regions()
	{
		return $this->belongsToMany(Region::class, 'antennesregions', 'antennes_id', 'regions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function collectives()
	{
		return $this->hasMany(Collective::class, 'antennes_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'antennes_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'antennes_id');
	}

	public function chef()
	{
		return $this->belongsTo(Employee::class, 'chef_id');
	}
}
