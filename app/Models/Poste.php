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
 * Class Poste
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $legende
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
class Poste extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'postes';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'legende',
		'image',
		'users_id'
	];

    public function getPoste()
    {
        $imagePath = $this->image ?? 'postes/default.png';
        return "/storage/" . $imagePath;
    }
	public function user()
	{
		return $this->belongsTo(User::class, 'users_id')->latest();
	}
}
