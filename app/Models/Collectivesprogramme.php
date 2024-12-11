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
 * Class Collectivesprogramme
 * 
 * @property int $id
 * @property int $collectives_id
 * @property int $programmes_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collective $collective
 * @property Programme $programme
 *
 * @package App\Models
 */
class Collectivesprogramme extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'collectivesprogrammes';

	protected $casts = [
		'collectives_id' => 'int',
		'programmes_id' => 'int'
	];

	protected $fillable = [
		'collectives_id',
		'programmes_id'
	];

	public function collective()
	{
		return $this->belongsTo(Collective::class, 'collectives_id');
	}

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id');
	}
}
