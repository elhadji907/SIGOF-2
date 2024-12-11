<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string $uuid
 * @property string $content
 * @property int|null $commentable_id
 * @property string|null $commentable_type
 * @property int $users_id
 * @property int $courriers_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 * @property User $user
 *
 * @package App\Models
 */
class Comment extends Model
{
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'comments';

	protected $casts = [
		'commentable_id' => 'int',
		'users_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'content',
		'commentable_id',
		'commentable_type',
		'users_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function commentable()
	{
		return $this->morphTo();
	}

	public function comments()
	{
		return $this->morphMany(Comment::class, 'Commentable')->latest();
	}
}
