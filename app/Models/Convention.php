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
 * Class Convention
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string|null $name
 * @property string|null $sigles
 * @property Carbon|null $date
 * @property string|null $items1
 * @property string|null $items2
 * @property string|null $description
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Formation[] $formations
 * @property Collection|Referentiel[] $referentiels
 *
 * @package App\Models
 */
class Convention extends Model
{

	use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'conventions';

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'sigle',
		'date',
		'items1',
		'items2',
		'description'
	];
	public function formations()
	{
		return $this->hasMany(Formation::class, 'conventions_id');
	}

	public function referentiels()
	{
		return $this->hasMany(Referentiel::class, 'conventions_id');
	}
}
