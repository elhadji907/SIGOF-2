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
 * Class Directionsimputation
 * 
 * @property int $id
 * @property int $directions_id
 * @property int $imputations_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Direction $direction
 * @property Imputation $imputation
 *
 * @package App\Models
 */
class Directionsimputation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'directionsimputations';

	protected $casts = [
		'directions_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $fillable = [
		'directions_id',
		'imputations_id'
	];

	public function direction()
	{
		return $this->belongsTo(Direction::class, 'directions_id');
	}

	public function imputation()
	{
		return $this->belongsTo(Imputation::class, 'imputations_id');
	}
}
