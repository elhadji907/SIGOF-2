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
 * Class TypesDemande
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $categorie
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Demandeur[] $demandeurs
 *
 * @package App\Models
 */
class TypesDemande extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'types_demandes';

	protected $fillable = [
		'uuid',
		'name',
		'categorie'
	];

	public function demandeurs()
	{
		return $this->hasMany(Demandeur::class, 'types_demandes_id');
	}
}
