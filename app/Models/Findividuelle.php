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
 * Class Findividuelle
 * 
 * @property int $id
 * @property string $uuid
 * @property string $code
 * @property string|null $categorie
 * @property int $formations_id
 * @property int|null $modules_id
 * @property int|null $projets_id
 * @property int|null $programmes_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Module|null $module
 * @property Programme|null $programme
 * @property Projet|null $projet
 * @property Formation $formation
 *
 * @package App\Models
 */
class Findividuelle extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'findividuelles';

	protected $casts = [
		'formations_id' => 'int',
		'modules_id' => 'int',
		'projets_id' => 'int',
		'programmes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'code',
		'categorie',
		'formations_id',
		'modules_id',
		'projets_id',
		'programmes_id'
	];

	public function module()
	{
		return $this->belongsTo(Module::class, 'modules_id');
	}

	public function programme()
	{
		return $this->belongsTo(Programme::class, 'programmes_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}
}
