<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Division
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $sigle
 * @property int $directions_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Direction $direction
 * @property Collection|Bureau[] $bureaus
 *
 * @package App\Models
 */
class Division extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'divisions';

	protected $casts = [
		'directions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'directions_id'
	];

	public function direction()
	{
		return $this->belongsTo(Direction::class, 'directions_id');
	}

	public function bureaus()
	{
		return $this->hasMany(Bureau::class, 'divisions_id');
	}
}
