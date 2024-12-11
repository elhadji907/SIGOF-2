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
 * Class Traitementcourrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Courrier[] $courriers
 *
 * @package App\Models
 */
class Traitementcourrier extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'traitementcourriers';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function courriers()
	{
		return $this->hasMany(Courrier::class, 'traitementcourriers_id');
	}
}
