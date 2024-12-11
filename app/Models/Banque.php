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
 * Class Banque
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $numero
 * @property int $courriers_id
 * @property float|null $montant
 * @property Carbon|null $date_ac
 * @property Carbon|null $date_dg
 * @property Carbon|null $date_cg
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Courrier $courrier
 *
 * @package App\Models
 */
class Banque extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'banques';

	protected $casts = [
		'courriers_id' => 'int',
		'montant' => 'float'
	];

	protected $dates = [
		'date_ac',
		'date_dg',
		'date_cg'
	];

	protected $fillable = [
		'uuid',
		'name',
		'numero',
		'courriers_id',
		'montant',
		'date_ac',
		'date_dg',
		'date_cg'
	];

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}
}
