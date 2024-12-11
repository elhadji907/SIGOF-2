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
 * Class Projet
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $sigle
 * @property string|null $description
 * @property Carbon|null $debut
 * @property Carbon|null $fin
 * @property float|null $budjet
 * @property string|null $statut
 * @property string|null $duree
 * @property string|null $image
 * @property string|null $convention_file
 * @property string|null $type_projet
 * @property string|null $type_localite
 * @property string|null $budjet_lettre
 * @property Carbon|null $date_signature
 * @property Carbon|null $date_ouverture
 * @property Carbon|null $date_fermeture
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Collective[] $collectives
 * @property Collection|Courrier[] $courriers
 * @property Collection|Depense[] $depenses
 * @property Collection|Fcollective[] $fcollectives
 * @property Collection|Findividuelle[] $findividuelles
 * @property Collection|Formation[] $formations
 * @property Collection|Individuelle[] $individuelles
 * @property Collection|Ingenieur[] $ingenieurs
 * @property Collection|Localite[] $localites
 * @property Collection|Module[] $modules
 * @property Collection|Zone[] $zones
 *
 * @package App\Models
 */
class Projet extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'projets';

	protected $casts = [
		'budjet' => 'float',
		'date_signature' => 'datetime',
		'date_ouverture' => 'datetime',
		'date_fermeture' => 'datetime',
		'debut' => 'datetime',
		'fin' => 'datetime',
	];

	protected $dates = [
		'debut',
		'fin',
		'date_signature',
		'date_ouverture',
		'date_fermeture'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'description',
		'debut',
		'fin',
		'budjet',
		'duree',
		'effectif',
		'statut',
		'budjet_lettre',
		'date_signature',
		'date_ouverture',
		'date_fermeture',
		'type_projet',
		'type_localite',
		'convention_file',
		'image',
	];

	
    public function getProjetImage()
    {
        $imagePath = $this->image ?? 'projets/default.png';
        return "/storage/" . $imagePath;
    }
	
    public function getConvention()
    {
        $imagePath = $this->convention_file ?? '';
        return "/storage/" . $imagePath;
    }

	public function projetmodules()
	{
		return $this->hasMany(Projetmodule::class, 'projets_id')->latest();
	}
	
	public function projetlocalites()
	{
		return $this->hasMany(Projetlocalite::class, 'projets_id')->latest();
	}

	public function collectives()
	{
		return $this->belongsToMany(Collective::class, 'collectivesprojets', 'projets_id', 'collectives_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function courriers()
	{
		return $this->hasMany(Courrier::class, 'projets_id');
	}

	public function depenses()
	{
		return $this->hasMany(Depense::class, 'projets_id');
	}

	public function fcollectives()
	{
		return $this->hasMany(Fcollective::class, 'projets_id');
	}

	public function findividuelles()
	{
		return $this->hasMany(Findividuelle::class, 'projets_id');
	}

	public function formations()
	{
		return $this->hasMany(Formation::class, 'projets_id');
	}

	public function individuelles()
	{
		return $this->hasMany(Individuelle::class, 'projets_id');
	}

	public function ingenieurs()
	{
		return $this->belongsToMany(Ingenieur::class, 'projetsingenieurs', 'projets_id', 'ingenieurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function localites()
	{
		return $this->belongsToMany(Localite::class, 'projetslocalites', 'projets_id', 'localites_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'projetsmodules', 'projets_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function zones()
	{
		return $this->belongsToMany(Zone::class, 'projetszones', 'projets_id', 'zones_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
