<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projetlocalite extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'projetlocalites';
    protected $casts = [
        'projets_id' => 'int',
    ];
    protected $fillable = [
        'uuid',
        'localite',
        'effectif',
        'projets_id',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projets_id')->latest();
    }
}
