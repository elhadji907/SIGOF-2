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
 * Class Profile
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $titre
 * @property string|null $description
 * @property string|null $url
 * @property string|null $image
 * @property int $users_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Profile extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'profiles';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'titre',
		'description',
		'url',
		'image',
		'users_id'
	];

	public function getImage(){
		$imagePath = $this->image ?? 'avatars/default.png';
		return "/storage/" . $imagePath;
	}
	
	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
