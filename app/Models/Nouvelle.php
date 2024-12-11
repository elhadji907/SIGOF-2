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
 * Class Nouvelle
 * 
 * @property int $id
 * @property string $uuid
 * @property string $items
 * @property Carbon|null $date
 * @property int $pcharges_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Pcharge $pcharge
 *
 * @package App\Models
 */
class Nouvelle extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'nouvelles';

	protected $casts = [
		'pcharges_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'items',
		'date',
		'pcharges_id'
	];

	public function pcharge()
	{
		return $this->belongsTo(Pcharge::class, 'pcharges_id');
	}
}
