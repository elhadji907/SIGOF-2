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
 * Class Operateursniveaux
 * 
 * @property int $id
 * @property int $operateurs_id
 * @property int $niveaux_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Niveaux $niveaux
 * @property Operateur $operateur
 *
 * @package App\Models
 */
class Operateursniveaux extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'operateursniveaux';

	protected $casts = [
		'operateurs_id' => 'int',
		'niveaux_id' => 'int'
	];

	protected $fillable = [
		'operateurs_id',
		'niveaux_id'
	];

	public function niveaux()
	{
		return $this->belongsTo(Niveaux::class);
	}

	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}
}
