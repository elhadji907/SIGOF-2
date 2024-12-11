<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operateurzone extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'operateurzones';

    protected $casts = [
        'operateurs_id' => 'int',
        'departements_id' => 'int',
    ];
    protected $fillable = [
        'uuid',
        'localite',
        'departements_id',
        'operateurs_id'
    ];
    public function operateur()
    {
        return $this->belongsTo(Operateur::class, 'operateurs_id')->latest();
    }

}
