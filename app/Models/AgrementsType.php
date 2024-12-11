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
 * Class AgrementsType
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $agrements_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agrement $agrement
 *
 * @package App\Models
 */
class AgrementsType extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'agrements_types';

	protected $casts = [
		'agrements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'agrements_id'
	];

	public function agrement()
	{
		return $this->belongsTo(Agrement::class, 'agrements_id');
	}
}
