<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indisponible extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    protected $table = 'indisponibles';

    protected $casts = [
        'individuelles_id' => 'int',
        'formations_id' => 'int',
    ];

    protected $fillable = [
        'uuid',
        'motif',
        'individuelles_id',
        'formations_id'
    ];


    public function individuelle()
    {
        return $this->belongsTo(Individuelle::class, 'individuelles_id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formations_id');
    }
}
