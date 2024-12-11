<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Une extends Model
{
    use HasFactory;
    use \App\Helpers\UuidForKey;
    use SoftDeletes;
    protected $casts = [
        'users_id' => 'int',
    ];
    protected $fillable = [
        'uuid',
        'titre1',
        'titre2',
        'image',
        'video',
        'message',
        'status',
        'users_id',
    ];

    public function getUne()
    {
        $imagePath = $this->image ?? 'unes/default.png';
        return "/storage/" . $imagePath;
    }

}
