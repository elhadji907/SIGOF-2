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
 * Class Agrement
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string|null $name
 * @property string|null $sigle
 * @property string|null $rccm
 * @property string|null $quitus
 * @property string|null $ninea
 * @property string|null $adresse
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $fixe
 * @property string|null $bp
 * @property string|null $fax
 * @property string|null $prenom_responsable
 * @property string|null $nom_responsable
 * @property string|null $email_responsable
 * @property string|null $telephone_responsabel
 * @property string|null $type
 * @property string|null $details
 * @property int|null $gestionnaires_id
 * @property int|null $operateurs_id
 * @property int|null $quitus_id
 * @property int|null $rccms_id
 * @property int|null $nineas_id
 * @property int|null $courriers_id
 * @property int|null $communes_id
 * @property string|null $file1
 * @property string|null $file2
 * @property string|null $file3
 * @property string|null $file4
 * @property string|null $file5
 * @property string|null $file6
 * @property string|null $file7
 * @property string|null $file8
 * @property string|null $file9
 * @property string|null $file10
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Commune|null $commune
 * @property Courrier|null $courrier
 * @property Gestionnaire|null $gestionnaire
 * @property Operateur|null $operateur
 * @property Collection|AgrementsType[] $agrements_types
 * @property Collection|Module[] $modules
 *
 * @package App\Models
 */
class Agrement extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'agrements';

	protected $casts = [
		'gestionnaires_id' => 'int',
		'operateurs_id' => 'int',
		'quitus_id' => 'int',
		'rccms_id' => 'int',
		'nineas_id' => 'int',
		'courriers_id' => 'int',
		'communes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'sigle',
		'rccm',
		'quitus',
		'ninea',
		'adresse',
		'email',
		'telephone',
		'fixe',
		'bp',
		'fax',
		'prenom_responsable',
		'nom_responsable',
		'email_responsable',
		'telephone_responsabel',
		'type',
		'details',
		'gestionnaires_id',
		'operateurs_id',
		'quitus_id',
		'rccms_id',
		'nineas_id',
		'courriers_id',
		'communes_id',
		'file1',
		'file2',
		'file3',
		'file4',
		'file5',
		'file6',
		'file7',
		'file8',
		'file9',
		'file10'
	];

	public function commune()
	{
		return $this->belongsTo(Commune::class, 'communes_id');
	}

	public function courrier()
	{
		return $this->belongsTo(Courrier::class, 'courriers_id');
	}

	public function gestionnaire()
	{
		return $this->belongsTo(Gestionnaire::class, 'gestionnaires_id');
	}

	public function ninea()
	{
		return $this->belongsTo(Ninea::class, 'nineas_id');
	}

	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}

	public function rccm()
	{
		return $this->belongsTo(Rccm::class, 'rccms_id');
	}

	public function agrements_types()
	{
		return $this->hasMany(AgrementsType::class, 'agrements_id');
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'modulesagrements', 'agrements_id', 'modules_id')
					->withPivot('id', 'moduleagrementstatut_id', 'deleted_at')
					->withTimestamps();
	}
}
