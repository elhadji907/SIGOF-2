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
 * Class Modulesagrement
 * 
 * @property int $id
 * @property int $modules_id
 * @property int $agrements_id
 * @property int|null $moduleagrementstatut_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Agrement $agrement
 * @property Module $module
 * @property Moduleagrementstatut|null $moduleagrementstatut
 *
 * @package App\Models
 */
class Modulesagrement extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'modulesagrements';

	protected $casts = [
		'modules_id' => 'int',
		'agrements_id' => 'int',
		'moduleagrementstatut_id' => 'int'
	];

	protected $fillable = [
		'modules_id',
		'agrements_id',
		'moduleagrementstatut_id'
	];

	public function agrement()
	{
		return $this->belongsTo(Agrement::class, 'agrements_id');
	}

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id');
	}

	public function moduleagrementstatut()
	{
		return $this->belongsTo(Moduleagrementstatut::class);
	}
}
