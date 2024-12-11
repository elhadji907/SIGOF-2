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
 * Class Collectivesprojet
 * 
 * @property int $id
 * @property int $collectives_id
 * @property int $projets_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collective $collective
 * @property Projet $projet
 *
 * @package App\Models
 */
class Collectivesprojet extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'collectivesprojets';

	protected $casts = [
		'collectives_id' => 'int',
		'projets_id' => 'int'
	];

	protected $fillable = [
		'collectives_id',
		'projets_id'
	];

	public function collective()
	{
		return $this->belongsTo(Collective::class, 'collectives_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}
}
