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
 * Class Moduleagrementstatut
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $statut
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Modulesagrement[] $modulesagrements
 *
 * @package App\Models
 */
class Moduleagrementstatut extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'moduleagrementstatut';

	protected $fillable = [
		'uuid',
		'statut'
	];

	public function modulesagrements()
	{
		return $this->hasMany(Modulesagrement::class);
	}
}
