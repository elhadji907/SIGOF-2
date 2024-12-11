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
 * Class Detail
 * 
 * @property int $id
 * @property string $uuid
 * @property string $observations
 * @property string|null $motif
 * @property string|null $name
 * @property int $formations_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Formation $formation
 *
 * @package App\Models
 */
class Detail extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'details';

	protected $casts = [
		'formations_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'observations',
		'motif',
		'name',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}
}
