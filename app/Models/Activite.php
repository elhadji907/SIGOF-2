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
 * Class Activite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $lieu
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Depense[] $depenses
 *
 * @package App\Models
 */
class Activite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'activites';

	protected $fillable = [
		'uuid',
		'name',
		'lieu'
	];

	public function depenses()
	{
		return $this->hasMany(Depense::class, 'activites_id');
	}
}
