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
 * Class Ninea
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string|null $name
 * @property Carbon|null $date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Agrement[] $agrements
 * @property Collection|Operateur[] $operateurs
 *
 * @package App\Models
 */
class Ninea extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'nineas';

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'date'
	];

	public function agrements()
	{
		return $this->hasMany(Agrement::class, 'nineas_id');
	}

	public function operateurs()
	{
		return $this->hasMany(Operateur::class, 'nineas_id');
	}
}
