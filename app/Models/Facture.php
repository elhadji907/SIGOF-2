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
 * Class Facture
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property Carbon|null $date_etablissement
 * @property string|null $details
 * @property float|null $montant1
 * @property float|null $montant2
 * @property float|null $autre_montant
 * @property float|null $total
 * @property int|null $formations_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Formation|null $formation
 * @property Collection|Reglement[] $reglements
 *
 * @package App\Models
 */
class Facture extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'factures';

	protected $casts = [
		'montant1' => 'float',
		'montant2' => 'float',
		'autre_montant' => 'float',
		'total' => 'float',
		'formations_id' => 'int'
	];

	protected $dates = [
		'date_etablissement'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_etablissement',
		'details',
		'montant1',
		'montant2',
		'autre_montant',
		'total',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id');
	}

	public function reglements()
	{
		return $this->hasMany(Reglement::class, 'factures_id');
	}
}
