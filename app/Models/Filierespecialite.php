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
 * Class Filierespecialite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $domaine
 * @property int|null $filieres_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Filiere|null $filiere
 *
 * @package App\Models
 */
class Filierespecialite extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'filierespecialites';

	protected $casts = [
		'filieres_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'domaine',
		'filieres_id'
	];

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieres_id');
	}
}
