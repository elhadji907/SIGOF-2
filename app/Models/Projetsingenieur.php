<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Projetsingenieur
 * 
 * @property int $id
 * @property int $projets_id
 * @property int $ingenieurs_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Ingenieur $ingenieur
 * @property Projet $projet
 *
 * @package App\Models
 */
class Projetsingenieur extends Model
{
	
    use HasFactory;
	use SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'projetsingenieurs';

	protected $casts = [
		'projets_id' => 'int',
		'ingenieurs_id' => 'int'
	];

	protected $fillable = [
		'projets_id',
		'ingenieurs_id'
	];

	public function ingenieur()
	{
		return $this->belongsTo(Ingenieur::class, 'ingenieurs_id');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'projets_id');
	}
}
