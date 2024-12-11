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
 * Class Scolarite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $annee
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_fin
 * @property string|null $statut
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Pcharge[] $pcharges
 *
 * @package App\Models
 */
class Scolarite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'scolarites';

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'annee',
		'date_debut',
		'date_fin',
		'statut'
	];

	public function pcharges()
	{
		return $this->hasMany(Pcharge::class, 'scolarites_id');
	}
}
