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
 * Class Antennesregion
 * 
 * @property int $id
 * @property int $antennes_id
 * @property int $regions_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Antenne $antenne
 * @property Region $region
 *
 * @package App\Models
 */
class Antennesregion extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'antennesregions';

	protected $casts = [
		'antennes_id' => 'int',
		'regions_id' => 'int'
	];

	protected $fillable = [
		'antennes_id',
		'regions_id'
	];

	public function antenne()
	{
		return $this->belongsTo(Antenne::class, 'antennes_id');
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id');
	}
}
