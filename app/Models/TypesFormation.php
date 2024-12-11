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
 * Class TypesFormation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $categorie
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Formation[] $formations
 *
 * @package App\Models
 */
class TypesFormation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'types_formations';

	protected $fillable = [
		'uuid',
		'name',
		'categorie'
	];

	public function formations()
	{
		return $this->hasMany(Formation::class, 'types_formations_id');
	}
}
