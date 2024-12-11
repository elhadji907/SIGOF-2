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
 * Class Modulesniveaux
 * 
 * @property int $id
 * @property int $modules_id
 * @property int $niveauxs_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Module $module
 * @property Niveaux $niveaux
 *
 * @package App\Models
 */
class Modulesniveaux extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'modulesniveauxs';

	protected $casts = [
		'modules_id' => 'int',
		'niveauxs_id' => 'int'
	];

	protected $fillable = [
		'modules_id',
		'niveauxs_id'
	];

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id');
	}

	public function niveaux()
	{
		return $this->belongsTo(Niveaux::class, 'niveauxs_id');
	}
}
