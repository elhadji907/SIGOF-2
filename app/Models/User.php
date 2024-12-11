<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/*  implements MustVerifyEmail */

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    use SoftDeletes;
    use \App\Helpers\UuidForKey;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $dates = [
        'date_naissance',
        'email_verified_at'
    ];

    protected $fillable = [
        'firstname',
        'cin',
        'name',
        'email',
        'telephone',
        'adresse',
        'image',
        'password',
        'created_by',
        'updated_by',
        'telephone_secondaire',
        'telephone_parent',
        'updated_by',

        'twitter',
        'facebook',
        'instagram',
        'linkedin',

        'uuid',
        'civilite',
        'username',
        'fixe',
        'date_naissance',
        'lieu_naissance',
        'bp',
        'fax',
        'email_verified_at',
        'deleted_by',
        'situation_professionnelle',
        'situation_familiale',
        'cin',
        'file_cin',
        'file_diplome',

        'operateur',
        'web',
        'typestructure',
        'categorie',
        'ninea',
        'rccm',
        'statut',
        'autre_statut',
        'email_responsable',
        'fonction_responsable',

        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_naissance' => 'datetime'
    ];

    public function getImage()
    {
        $imagePath = $this->image ?? 'avatars/default.png';
        return "/storage/" . $imagePath;
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'titre'    =>    '',
                'description'    =>    '',
                'url'    =>    ''
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function operateurmodules()
    {
        return $this->hasMany(Operateurmodule::class, 'users_id')->latest();
    }
    public function administrateur()
    {
        return $this->hasOne(Administrateur::class, 'users_id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'users_id');
    }

    public function beneficiaire()
    {
        return $this->hasOne(Beneficiaire::class, 'users_id');
    }

    public function coment()
    {
        return $this->hasOne(Coment::class, 'users_id');
    }

    public function commentaire()
    {
        return $this->hasOne(Commentaire::class, 'users_id');
    }

    public function commentere()
    {
        return $this->hasOne(Commentere::class, 'users_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function comptable()
    {
        return $this->hasOne(Comptable::class, 'users_id');
    }

    public function courriers()
    {
        return $this->hasMany(Courrier::class, 'users_id')->latest();
    }

    public function demandeur()
    {
        return $this->hasOne(Demandeur::class, 'users_id')->latest();
    }

    public function individuelles()
    {
        return $this->hasMany(Individuelle::class, 'users_id')->latest();
    }

    public function collectives()
    {
        return $this->hasMany(Collective::class, 'users_id')->latest();
    }


    public function pcharges()
    {
        return $this->hasMany(Pcharge::class, 'users_id')->latest();
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'users_id')->latest()->latest();
    }

    public function etablissement()
    {
        return $this->hasOne(Etablissement::class, 'users_id');
    }

    public function gestionnaire()
    {
        return $this->hasOne(Gestionnaire::class, 'users_id');
    }

    public function operateurs()
    {
        return $this->hasMany(Operateur::class, 'users_id')->latest();
    }

    public function postes()
    {
        return $this->hasMany(Poste::class, 'users_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'users_id');
    }

    public function imputations()
    {
        return $this->belongsToMany(Imputation::class, 'usersimputations', 'users_id', 'imputations_id')
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }
    public function validationindividuelle()
    {
        return $this->hasOne(Validationindividuelle::class, 'validated_id');
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function arrives()
	{
		return $this->belongsToMany(Arrive::class, 'courrierarrivesusers', 'users_id', 'arrives_id')
			->withPivot('id', 'deleted_at')
			->withTimestamps();
	}

    public function files()
    {
        return $this->hasMany(File::class, 'users_id')->latest();
    }
}
