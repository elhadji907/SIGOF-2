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
 * Class Programmeslocalite
 * 
 * @property int $id
 * @property int $programmes_id
 * @property int $localites_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Localite $localite
 * @property Programme $programme
 *
 * @package App\Models
 */
class Programmeslocalite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'programmeslocalites';

	protected $casts = [
		'programmes_id' => 'int',
		'localites_id' => 'int'
	];

	protected $fillable = [
		'programmes_id',
		'localites_id'
	];

	public function localite()
	{
		return $this->belongsTo(Localite::class, 'localites_id');
	}

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id');
	}
}
