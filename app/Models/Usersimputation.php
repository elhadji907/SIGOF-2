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
 * Class Usersimputation
 * 
 * @property int $id
 * @property int $users_id
 * @property int $imputations_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Imputation $imputation
 * @property User $user
 *
 * @package App\Models
 */
class Usersimputation extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'usersimputations';

	protected $casts = [
		'users_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $fillable = [
		'users_id',
		'imputations_id'
	];

	public function imputation()
	{
		return $this->belongsTo(Imputation::class, 'imputations_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
