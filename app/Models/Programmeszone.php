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
 * Class Programmeszone
 * 
 * @property int $id
 * @property int $programmes_id
 * @property int $zones_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Programme $programme
 * @property Zone $zone
 *
 * @package App\Models
 */
class Programmeszone extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'programmeszones';

	protected $casts = [
		'programmes_id' => 'int',
		'zones_id' => 'int'
	];

	protected $fillable = [
		'programmes_id',
		'zones_id'
	];

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id');
	}

	public function zone()
	{
		return $this->belongsTo(Zone::class, 'zones_id');
	}
}
