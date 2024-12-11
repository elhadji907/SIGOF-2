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
 * Class Directionscourrier
 * 
 * @property int $id
 * @property int $directions_id
 * @property int $courriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 * @property Direction $direction
 *
 * @package App\Models
 */
class Directionscourrier extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'directionscourriers';

	protected $casts = [
		'directions_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'directions_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function direction()
	{
		return $this->belongsTo(Direction::class, 'directions_id');
	}
}
