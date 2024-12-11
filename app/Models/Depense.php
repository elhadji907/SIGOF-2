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
 * Class Depense
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string|null $designation
 * @property string|null $fournisseurs
 * @property float|null $montant
 * @property float|null $tva
 * @property float|null $ir
 * @property float|null $autre_montant
 * @property float|null $total
 * @property int|null $activites_id
 * @property int|null $projets_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Activite|null $activite
 * @property Projet|null $projet
 *
 * @package App\Models
 */
class Depense extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'depenses';

	protected $casts = [
		'montant' => 'float',
		'tva' => 'float',
		'ir' => 'float',
		'autre_montant' => 'float',
		'total' => 'float',
		'activites_id' => 'int',
		'projets_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'designation',
		'fournisseurs',
		'montant',
		'tva',
		'ir',
		'autre_montant',
		'total',
		'activites_id',
		'projets_id'
	];

	public function activite()
	{
		return $this->belongsTo(Activite::class, 'activites_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}
}
