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
 * Class Projetsmodule
 * 
 * @property int $id
 * @property int $projets_id
 * @property int $modules_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Module $module
 * @property Projet $projet
 *
 * @package App\Models
 */
class Projetsmodule extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'projetsmodules';

	protected $casts = [
		'projets_id' => 'int',
		'modules_id' => 'int'
	];

	protected $fillable = [
		'projets_id',
		'modules_id'
	];

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}
}
