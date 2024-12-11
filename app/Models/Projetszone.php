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
 * Class Projetszone
 * 
 * @property int $id
 * @property int $projets_id
 * @property int $zones_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Projet $projet
 * @property Zone $zone
 *
 * @package App\Models
 */
class Projetszone extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'projetszones';

	protected $casts = [
		'projets_id' => 'int',
		'zones_id' => 'int'
	];

	protected $fillable = [
		'projets_id',
		'zones_id'
	];

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}

	public function zone()
	{
		return $this->belongsTo(Zone::class, 'zones_id');
	}
}
