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
 * Class Filiere
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $domaine
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Etablissement[] $etablissements
 * @property Collection|Filierespecialite[] $filierespecialites
 * @property Collection|Pcharge[] $pcharges
 *
 * @package App\Models
 */
class Filiere extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'filieres';

	protected $fillable = [
		'uuid',
		'name',
		'domaine'
	];

	public function etablissements()
	{
		return $this->belongsToMany(Etablissement::class, 'etablissementsfilieres', 'filieres_id', 'etablissements_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function filierespecialites()
	{
		return $this->hasMany(Filierespecialite::class, 'filieres_id');
	}

	public function pcharges()
	{
		return $this->hasMany(Pcharge::class, 'filieres_id');
	}
}
