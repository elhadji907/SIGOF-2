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
 * Class Village
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $nom
 * @property int|null $chef_id
 * @property int $communes_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Commune $commune
 * @property Collection|Beneficiaire[] $beneficiaires
 *
 * @package App\Models
 */
class Village extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'villages';

	protected $casts = [
		'chef_id' => 'int',
		'communes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'chef_id',
		'communes_id'
	];

	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(Beneficiaire::class, 'villages_id');
	}
}
