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
 * Class Gestionnaire
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property int|null $users_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|Agrement[] $agrements
 * @property Collection|Beneficiaire[] $beneficiaires
 *
 * @package App\Models
 */
class Gestionnaire extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'gestionnaires';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(Agrement::class, 'gestionnaires_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(Beneficiaire::class, 'gestionnaires_id');
	}
}
