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
 * Class Reglement
 * 
 * @property int $id
 * @property string $uuid
 * @property Carbon|null $date
 * @property float|null $montant
 * @property int $types_id
 * @property int $factures_id
 * @property int $comptables_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Comptable $comptable
 * @property Facture $facture
 * @property Type $type
 *
 * @package App\Models
 */
class Reglement extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'reglements';

	protected $casts = [
		'montant' => 'float',
		'types_id' => 'int',
		'factures_id' => 'int',
		'comptables_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'date',
		'montant',
		'types_id',
		'factures_id',
		'comptables_id'
	];

	public function comptable()
	{
		return $this->belongsTo(Comptable::class, 'comptables_id');
	}

	public function facture()
	{
		return $this->belongsTo(Facture::class, 'factures_id');
	}

	public function type()
	{
		return $this->belongsTo(Type::class, 'types_id');
	}
}
