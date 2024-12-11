<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Referentiel
 * 
 * @property int $id
 * @property string $uuid
 * @property string $intitule
 * @property string|null $titre
 * @property string|null $categorie
 * @property string|null $reference
 * @property Carbon|null $date_publication
 * @property Carbon|null $date_revision
 * @property string|null $description
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Convention $convention
 * 
 * @property Collection|Formation[] $formations
 *
 * @package App\Models
 */

class Referentiel extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'referentiels';

    protected $dates = [
        'date',
        'date_publication',
        'date_revision',
    ];

    protected $casts = [
        'conventions_id' => 'int',
        'date_publication' => 'datetime',
        'date_revision' => 'datetime',
    ];
    protected $fillable = [
        'uuid',
        'intitule',
        'titre',
        'categorie',
        'reference',
        'date_publication',
        'date_revision',
        'description',
        'conventions_id'
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class, 'referentiels_id');
    }
    public function convention()
    {
        return $this->belongsTo(Convention::class, 'conventions_id');
    }
}
