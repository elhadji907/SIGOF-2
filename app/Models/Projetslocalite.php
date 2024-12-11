<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Projetslocalite
 * 
 * @property int $id
 * @property int $projets_id
 * @property int $localites_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Localite $localite
 * @property Projet $projet
 *
 * @package App\Models
 */
class Projetslocalite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'projetslocalites';

	protected $casts = [
		'projets_id' => 'int',
		'localites_id' => 'int'
	];

	protected $fillable = [
		'projets_id',
		'localites_id'
	];

	public function localite()
	{
		return $this->belongsTo(Localite::class, 'localites_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}
}
