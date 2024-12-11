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
 * Class Beneficiaire
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property Carbon|null $date
 * @property string|null $lieu
 * @property int|null $gestionnaires_id
 * @property int|null $users_id
 * @property int|null $villages_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Village|null $village
 * @property Gestionnaire|null $gestionnaire
 * @property User|null $user
 *
 * @package App\Models
 */
class Beneficiaire extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'beneficiaires';

	protected $casts = [
		'gestionnaires_id' => 'int',
		'users_id' => 'int',
		'villages_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'date',
		'lieu',
		'gestionnaires_id',
		'users_id',
		'villages_id'
	];

	public function village()
	{
		return $this->belongsTo(Village::class, 'villages_id');
	}

	public function gestionnaire()
	{
		return $this->belongsTo(Gestionnaire::class, 'gestionnaires_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
