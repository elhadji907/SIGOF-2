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
 * Class Statut
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $niveau
 * @property string|null $details
 * @property Carbon|null $date1
 * @property Carbon|null $date2
 * @property Carbon|null $date3
 * @property Carbon|null $date5
 * @property Carbon|null $date6
 * @property Carbon|null $date7
 * @property Carbon|null $date8
 * @property Carbon|null $date9
 * @property Carbon|null $date10
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Formation[] $formations
 * @property Collection|Module[] $modules
 *
 * @package App\Models
 */
class Statut extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'statuts';

	protected $dates = [
		'date1',
		'date2',
	];

	protected $fillable = [
		'uuid',
		'statut',
		'niveau',
		'details',
		'date1',
		'date2',
		'formations_id',
	];

	public function formations()
	{
		return $this->hasMany(Formation::class, 'statuts_id');
	}

	public function modules()
	{
		return $this->hasMany(Module::class, 'statuts_id');
	}

	
	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}
}
