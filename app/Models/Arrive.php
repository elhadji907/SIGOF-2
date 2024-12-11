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
 * Class Arrive
 * 
 * @property int $id
 * @property string|null $numero
 * @property string|null $type
 * @property string $uuid
 * @property int $courriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 *
 * @package App\Models
 */
class Arrive extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'arrives';

	protected $casts = [
		'courriers_id' => 'int',
	];

	protected $fillable = [
		'numero',
		'uuid',
		'courriers_id',
		'type',
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function employees()
	{
		return $this->belongsToMany(Employee::class, 'courrierarrivesemployes', 'arrives_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'courrierarrivesusers', 'arrives_id', 'users_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
