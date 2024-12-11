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
 * Class Etablissementsfiliere
 * 
 * @property int $id
 * @property int $etablissements_id
 * @property int $filieres_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Etablissement $etablissement
 * @property Filiere $filiere
 *
 * @package App\Models
 */
class Etablissementsfiliere extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'etablissementsfilieres';

	protected $casts = [
		'etablissements_id' => 'int',
		'filieres_id' => 'int'
	];

	protected $fillable = [
		'etablissements_id',
		'filieres_id'
	];

	public function etablissement()
	{
		return $this->belongsTo(Etablissement::class, 'etablissements_id');
	}

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieres_id');
	}
}
