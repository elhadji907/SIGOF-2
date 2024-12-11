<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string|null $numero
 * @property string|null $module
 * @property string|null $domaine
 * @property string|null $niveau_qualification
 * @property string|null $motif
 * @property string|null $adresse
 * @property string|null $contact
 * @property string|null $statut
 * @property int|null $collectives_id
 * @property int|null $departements_id
 * @property int|null $formations_id
 * @property int|null $regions_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Domaine|null $domaine
 * @property Specialite|null $specialite
 * @property Collective|null $collective
 * @property Statut|null $statut
 * @property Collection|Collective[] $collectives
 * @property Collection|Formation[] $formations
 *
 * @package App\Models
 */

class Collectivemodule extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'collectivemodules';

    protected $casts = [
        'collectives_id' => 'int',
        'departements_id' => 'int',
		'formations_id' => 'int',
        'regions_id' => 'int'
    ];

    protected $fillable = [
        'uuid',
        'numero',
        'module',
        'domaine',
        'niveau_qualification',
        'motif',
        'adresse',
        'contact',
        'statut',
        'collectives_id',
		'formations_id',
        'departements_id',
        'regions_id'
    ];

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'formations_id')->latest();
	}
    public function collective()
    {
        return $this->belongsTo(Collective::class, 'collectives_id');
    }
	public function listecollectives()
	{
		return $this->hasMany(Listecollective::class, 'collectivemodules_id');
	}
    
/* 	public function formations()
	{
		return $this->hasMany(Formation::class, 'modules_id');
	} */
}
