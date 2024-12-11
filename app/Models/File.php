<?php

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
 * @property string $legende
 * @property string $file
 * @property string $sigle
 * @property string|null $cin
 * @property string|null $cin_recto
 * @property string|null $cin_verso
 * @property string|null $residence
 * @property string|null $diplome_academique
 * @property string|null $diplome_professionnel
 * @property string|null $autre_diplome
 * @property string|null $attestation
 * @property string|null $acte_creation
 * @property string|null $bulletins
 * @property string|null $autre
 * @property string|null $cv
 * @property int|null $users_id
 * @property int|null $operateurs_id
 * @property int|null $pcharges_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at

 * @property User $user
 * @property Operateur $operateur
 * @property Pcharge $pcharge
 *
 * @package App\Models
 */

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'files';
    protected $casts = [
        'users_id' => 'int',
        'operateurs_id' => 'int',
        'pcharges_id' => 'int',
    ];
    protected $fillable = [
        'uuid',
        'legende',
        'file',
        'sigle',
        'cin',
        'cin_recto',
        'cin_verso',
        'residence',
        'diplome_academique',
        'diplome_professionnel',
        'autre_diplome',
        'attestation',
        'acte_creation',
        'bulletins',
        'cv',
        'autre',
        'operateurs_id',
        'users_id',
        'pcharges_id',
    ];

	public function getFichier(){
		$filePath = $this->file ?? 'uploads';
		return "/storage/" . $filePath;
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
	public function operateur()
	{
		return $this->belongsTo(Operateur::class, 'operateurs_id');
	}
	public function pcharge()
	{
		return $this->belongsTo(Pcharge::class, 'pcharges_id');
	}
}
