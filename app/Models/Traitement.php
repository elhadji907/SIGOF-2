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
 * Class Traitement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $observations
 * @property string|null $motif
 * @property string|null $name
 * @property int|null $operateurs_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Operateur|null $operateur
 * @property Collection|Formation[] $formations
 *
 * @package App\Models
 */
class Traitement extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'traitements';

	protected $casts = [
		'operateurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'observations',
		'motif',
		'name',
		'operateurs_id'
	];

	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'traitements_id');
	}
}
