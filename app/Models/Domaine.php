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
 * Class Domaine
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $description
 * @property int|null $secteurs_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Secteur|null $secteur
 * @property Collection|Module[] $modules
 *
 * @package App\Models
 */
class Domaine extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'domaines';

	protected $casts = [
		'secteurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'description',
		'secteurs_id'
	];

	public function secteur()
	{
		return $this->belongsTo(Secteur::class, 'secteurs_id');
	}

	public function modules()
	{
		return $this->hasMany(Module::class, 'domaines_id');
	}
}
