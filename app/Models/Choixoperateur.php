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
 * Class Choixoperateur
 * 
 * @property int $id
 * @property string $uuid
 * @property int|null $annee
 * @property string|null $trimestre
 * @property string|null $description
 * @property Carbon|null $date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Formation[] $formations
 *
 * @package App\Models
 */
class Choixoperateur extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'choixoperateurs';

	protected $casts = [
		'annee' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'annee',
		'trimestre',
		'description',
		'date'
	];

	public function formations()
	{
		return $this->hasMany(Formation::class, 'choixoperateurs_id');
	}
}
