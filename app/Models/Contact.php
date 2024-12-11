<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * 
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $uuid
 * @property int $notifiable_id
 * @property string $data
 * @property string $objet
 * @property string $email
 * @property string $telephone
 * @property string $message
 * @property string $reponse
 * @property string $statut
 * @property Carbon|null $read_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Contact extends Model
{
    use SoftDeletes;
    use \App\Helpers\UuidForKey;

    protected $table = 'contacts';

    protected $casts = [
        'commentable_id' => 'int',
        'users_id' => 'int',
        'courriers_id' => 'int',
		'notifiable_id' => 'int'
    ];

	protected $dates = [
		'read_at'
	];

    protected $fillable = [
        'uuid',
        'objet',
        'email',
        'telephone',
        'message',
        'reponse',
        'statut',
		'type',
		'notifiable_type',
		'notifiable_id',
        'users_id',
		'data',
		'read_at'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'Commentable')->latest();
    }
}
