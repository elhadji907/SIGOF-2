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
 * Class Bureau
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $sigle
 * @property int $divisions_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Division $division
 *
 * @package App\Models
 */
class Bureau extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'bureaus';

	protected $casts = [
		'divisions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'divisions_id'
	];

	public function division()
	{
		return $this->belongsTo(Division::class, 'divisions_id');
	}
}
