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
 * Class Evaluation
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string $name
 * @property Carbon|null $date
 * @property float|null $note
 * @property string|null $appreciation
 * @property string|null $mention
 * @property int|null $formations_id
 * @property int|null $evaluateurs_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Evaluateur|null $evaluateur
 * @property Formation|null $formation
 *
 * @package App\Models
 */
class Evaluation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'evaluations';

	protected $casts = [
		'note' => 'float',
		'formations_id' => 'int',
		'evaluateurs_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'date',
		'note',
		'appreciation',
		'mention',
		'formations_id',
		'evaluateurs_id'
	];

	public function evaluateur()
	{
		return $this->belongsTo(Evaluateur::class, 'evaluateurs_id');
	}

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}
}
