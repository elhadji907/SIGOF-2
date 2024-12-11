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
 * Class Commentere
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $content
 * @property int|null $commentable_id
 * @property string|null $commentable_type
 * @property Carbon|null $cread_at
 * @property int $users_id
 * @property int $operateurs_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Operateur $operateur
 * @property User $user
 *
 * @package App\Models
 */
class Commentere extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'commenteres';

	protected $casts = [
		'commentable_id' => 'int',
		'users_id' => 'int',
		'operateurs_id' => 'int'
	];

	protected $dates = [
		'cread_at'
	];

	protected $fillable = [
		'uuid',
		'content',
		'commentable_id',
		'commentable_type',
		'cread_at',
		'users_id',
		'operateurs_id'
	];

	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
