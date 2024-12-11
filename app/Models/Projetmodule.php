<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projetmodule extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'projetmodules';

    protected $casts = [
        'projets_id' => 'int',
    ];
    protected $fillable = [
        'uuid',
        'module',
        'domaine',
        'effectif',
        'projets_id'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projets_id')->latest();
    }
}
