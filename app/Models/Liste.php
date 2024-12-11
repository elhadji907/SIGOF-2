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
 * Class Liste
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string|null $destinataire
 * @property Carbon|null $date
 * @property string|null $name
 * @property string|null $liste
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Bordereau[] $bordereaus
 *
 * @package App\Models
 */
class Liste extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'listes';

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'destinataire',
		'date',
		'name',
		'liste'
	];

	public function bordereaus()
	{
		return $this->hasMany(Bordereau::class, 'listes_id');
	}
}
