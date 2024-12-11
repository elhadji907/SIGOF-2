<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

/**
 * Class Loi
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */

class Loi extends Model
{
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'lois';

    protected $fillable = [
		'name',
		'uuid'
	];



	public function employes()
	{
		return $this->belongsToMany(Employee::class, 'employeslois', 'lois_id', 'employes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
